<?php

namespace App\Http\Controllers;

use App\Settings;
use Carbon\Carbon;
use DiscordWebhooks\Client;
use DiscordWebhooks\Embed;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $Settings;

    public function __construct(){
        App::setLocale('fr');
        Carbon::setLocale("fr");
        Config::set('app.timezone', 'America/New_York');
        Config::set('app.name', Settings::Field('servername'));
    }

    public function publishDiscord(string $channel, string $title, string $msg = null, $user = null , string $url = null){
        if ($channel == 'staff' ||  Settings::Field('webhook_activated')){

            $webhook = new Client(Settings::Field('webhook_'.$channel));

            $embed = new Embed();
            if ($user){
                $embed->title($title);
                $embed->thumbnail($user->avatar);
                $embed->description($msg);
                $embed->url($url);
            }else{
                $embed->thumbnail(asset('assets/img/Webhook.jpg'));
                $embed->title($title);
                $embed->description($msg);
            }

            $webhook->username(Settings::Field('servername'))->embed($embed)->send();
        }
    }
}
