<?php
/**
 * Created by PhpStorm.
 * User: mcspa
 * Date: 2018-03-10
 * Time: 14:51
 */

namespace App\Fivem;


use Illuminate\Database\Eloquent\Model;

class AccountData extends Model
{
    protected $connection = "gta5";

    protected $table = "addon_account_data";


    public function invoices(){

    }

}