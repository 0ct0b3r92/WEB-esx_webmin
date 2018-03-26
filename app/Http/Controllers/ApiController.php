<?php
/**
 * Created by PhpStorm.
 * User: mcspa
 * Date: 2018-02-04
 * Time: 12:04
 */

namespace App\Http\Controllers;

use App\Comment;
use App\Fivem\Player;
use App\Settings;
use App\User;
use App\Whitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class ApiController extends Controller {

    public function accepted(Request $request){
        $Member = User::where('id', $request->input('member'))->first();
        $Member->whitelisted = '1';
        $Member->save();
        Whitelist::where('user_id', $Member->id)->update(['status' => 1, 'admin_id' => $request->input('validationBy')]);
        $this->publishDiscord('general', 'Bienvenue en ville ' .$Member->username . "!", "Votre passeport est a présent valide. Vous pouvez désormais trouver l'emploi de vos rêves !", $Member, null);

        $return = [
            'title' => "$Member->username a bien été accepté",
            'text' => "Ce membre fait maintenant partie de notre fabuleuse liste de membre"
        ];
        return json_encode($return);
    }

    public function refuse(Request $request){
        $Member = User::where('id', $request->input('member'))->first();
        $Member->whitelisted = '0';
        $Member->save();
        Whitelist::where('user_id', $Member->id)->update(['status' => 2, 'admin_id' => $request->input('validationBy')]);
        $this->publishDiscord('general', $Member->username . " votre passeport n'est pas valide!", "Votre passeport a été refusé. Vous devez contacter les douanes pour plus de renseignements !", $Member, null);
        $return = [
            'title' => "$Member->username a bien été refusé",
            'text' => "Ce membre doit maintenant refaire une candidature pour retanter sa chance"
        ];
        return json_encode($return);
    }

    public function ActivateWhitelist(Request $request){

        $Settings = Settings::first();
        $Settings->whitelisted = $request->input('whitelisted');
        $Settings->save();
        $return = [
            'title' => "La whitelist a bien été modifié",
            'text' => ''
        ];
        $this->publishDiscord(
            'general',
            'Douane',$request->input('whitelisted') == 1 ? 'Les douanes sont maintenant Fermé!' : 'Les douanes sont maintenant Ouverte a tous!'
        );

        return json_encode($return);
    }

    public function ActivateWebhook(Request $request){

        $Settings = Settings::first();
        $Settings->webhook_activated = $request->input('webhook_activated');
        $Settings->save();
        $return = [
            'title' => "Les paramêtre discord webhook ont bien été modifié",
            'text' => ''
        ];
        $this->publishDiscord(
            'staff',
            'Notification ',$request->input('webhook_activated') == 1 ? 'Les notifications sont maintenant activé!' : 'Les notifications sont maintenant désactivé!'
        );
        return json_encode($return);
    }

    public function commentDelete(Request $request){

        $comment = Comment::find($request->input('comment'));
        $comment->delete();

        $return = [
            'title' => "Commentaire Supprimé",
            'text' => ''
        ];

        return json_encode($return);
    }

    public function StartBot(){

        $process = new Process('ls ' . storage_path('/'));

        $process->run();

        if (!$process->isSuccessful()) {
            $return = [
                'title' => "Impossible de démarré le bot",
                'text' => '',
                'Process' => $process->getStatus()
            ];
        }


        $return = [
            'title' => "Les paramêtre discord webhook ont bien été modifié",
            'text' => '',
            'Process' => $process->getOutput()
        ];


        dd($return);
    }

    public function GetPlayersCharts(){
        $players = Player::select(DB::raw('MONTHNAME(lastconnexion) as date'), DB::raw('count(*) as total'))->orderBy('date')
            ->groupBy('date')
            ->get();

            $return = [];

            foreach ($players as $data){
                array_push($return , $data);
            }

            return json_encode($return);
    }

}