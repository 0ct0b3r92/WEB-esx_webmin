<?php

namespace App\Facades;

use cebe\markdown\GithubMarkdown;
use Illuminate\Support\Facades\Facade;

class Markdown extends Facade {

    protected static function getFacadeAccessor()
    {
        return GithubMarkdown::class;
    }

}