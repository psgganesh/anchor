<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class NuxtController extends Controller
{
    public function serveFrontEnd()
    {
        return file_get_contents(public_path('_nuxt/index.html'));
    }
}