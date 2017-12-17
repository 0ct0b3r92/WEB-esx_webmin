<?php

namespace App\Http\Controllers;

use App\Players;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        Carbon::setLocale('fr');
    }


    public function canView($Players,$Group){

        if($Player->group == $Group) {
            return true;
        }

        return redirect(url('home'));

    }


    public function getMoney(){

        $MoneyEco = 0;

        foreach(Players::all() as $player){
            $Pmoney = $player->money + $player->bank;
            $MoneyEco += $Pmoney;
        }

        return number_format($MoneyEco, 2, ',', ' ');

    }

    protected function getSystemLoad()
    {
        // CPU USAGE
        $loads = sys_getloadavg();
        $core_nums = trim(shell_exec("grep -E '^processor' /proc/cpuinfo|wc -l"));
        $load = round($loads[0]/($core_nums + 1)*100, 0);
        return $load;
    }
}
