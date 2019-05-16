<?php

namespace App\Http\Controllers\Api\v1;

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
        $data = [
            'encryption_key' => (config('app.key'))? 'generated':'empty',
            'api_version' => config('app.api_version'),
            'dated' => today()->toDateString()
        ];

        return $this->respond($data, 200, "Welcome");
    }
}
