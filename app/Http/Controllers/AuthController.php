<?php
namespace App\Http\Controllers;

use App\Http\Requests\WhitelistRequest;
use App\Whitelist;
use Illuminate\Support\Facades\Auth;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;

class AuthController extends Controller
{
    /**
     * The SteamAuth instance.
     *
     * @var SteamAuth
     */
    protected $steam;

    /**
     * AuthController constructor.
     *
     * @param SteamAuth $steam
     */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    /**
     * the user to the authentication page
     *
     * @return Login views
     */
    public function login()
    {
        return view('auth.login2');
    }

    /**
     * Redirect the user to the authentication page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
     * Get user info and log in
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {

                $user = $this->findOrNewUser($info);

                Auth::login($user, true);

                return redirect( config('app.url') ); // redirect to site
            }
        }
        return $this->redirectToSteam();
    }

    /**
     * Getting user by info or created if not exists
     *
     * @param $info
     * @return User
     */
    protected function findOrNewUser($info)
    {
        $user = User::where('steamid', 'steam:'.dechex($info->steamID64))->first();

        if (!is_null($user)) {
            $user->update(['username' => $info->personaname, 'avatar' => $info->avatarfull]);
            return $user;
        }

        return User::create([
            'username' => $info->personaname,
            'avatar' => $info->avatarfull,
            'steamid' => 'steam:'.dechex($info->steamID64)
        ]);
    }

    public function profile(){

        $member = User::where('id',isset($user_id) ? $user_id : Auth::user()->id)->first();

        if(Auth::user()->StatusWL != null){
            return view('Website.profile',compact('member'));
        }

        return view('Website.join');
    }


    public function WhitelistCreate(){

        if(Auth::user()->StatusWL != null){
            return redirect(route('profile.index'));
        }

        return view('Website.join');
    }

    public function WhitelistStore(WhitelistRequest $request){
        $isPosted = Whitelist::where(['user_id' => Auth::user()->id])->first();

        if(!$isPosted) {
            Whitelist::create($request->all());
            $this->publishDiscord('staff', Auth::user()->username . ' a posté sa candidature !', null, Auth::user() , route('manager.index'));
        }

        return redirect(route('profile.index'))->with(['success' => 'Nous avons bien reçu votre candidature, un membre validera des que possible!']);
    }
}