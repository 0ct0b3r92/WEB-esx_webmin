<?php

namespace App\Http\Controllers;

use App\Players;
use Carbon\Carbon;
use DiscordWebhooks\Client;
use DiscordWebhooks\Embed;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $template;

    public function __construct(){
        Carbon::setLocale('fr');
        $this->template = 'Themes.Sadmin';
    }


    public function view($views, $vars = null){
        return view($this->template . '.' .$views, $vars);
    }

    public function publishDiscord(string $msg,$vars){
        $webhook = new Client(env('DISCORD_WEBHOOKS'));
        $embed = new Embed();
        $embed->author($vars->Member->username);
        $embed->title('Nouvelle Candidature');
        $embed->thumbnail($vars->Member->avatar);
        $embed->url(route('whitelist.show',['id' => $vars->id]));




        $webhook->username(config('app.name'))->embed($embed)->send();
    }

    public function getMoney(){

        $MoneyEco = 0;

        foreach(Players::all() as $player){
            $Pmoney = $player->money + $player->bank;
            $MoneyEco += $Pmoney;
        }

        return number_format($MoneyEco, 2, ',', ' ');

    }

    protected function isWhitelisted(){
        return true;
    }

    protected function OnlinePlayers(){

    }
}
