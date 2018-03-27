<?php


/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/

function isActiveNavRoute($route)
{
    if(is_array($route)){
        if (in_array(Route::currentRouteName(),$route)) return 'navigation__active';
    }

    if (Route::currentRouteName() == $route) return 'navigation__active';
}

function isActiveRoute($route)
{
    if(is_array($route)){
        if (in_array(Route::currentRouteName(),$route)) return 'active';
    }

    if (Route::currentRouteName() == $route) return 'active';
}

/*
|--------------------------------------------------------------------------
| Detect Status of the servers
|--------------------------------------------------------------------------
|
| Give you a value to get the status of the servers
|
*/

function Status($ip,$port){
    $fp = @fsockopen($ip, $port, $errno, $errstr, 5);

    if(!$fp) {
        return false;
    }
    return true;
}

function isOnline($ip,$port){
    $fp = @fsockopen($ip, $port, $errno, $errstr, 5);
    if($fp) {
        return '<span class="result win">En Ligne</span>';
    } else {
        return '<span class="result lose">Hors Ligne</span>';
    }
}
