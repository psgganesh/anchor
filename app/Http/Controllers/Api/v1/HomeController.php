<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class HomeController extends ApiController
{
    /**
     * Display API home page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return file_get_contents(public_path('docs/index.html'));
    }

    /**
     * Get the authenticated user
     *
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        return $request->user();
    }
}
