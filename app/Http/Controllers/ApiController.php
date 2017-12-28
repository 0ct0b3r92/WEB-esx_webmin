<?php

namespace App\Http\Controllers;


class ApiController extends Controller
{
    static protected $Players;

    public function getOnlinePlayers(){
        $json = file_get_contents('http://'.env('GTA5_HOST').':30120/players.json');
        $data = json_decode($json,true);
        return json_encode(count($data));
    }
}
