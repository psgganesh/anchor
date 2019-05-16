<?php

namespace App\Modules\Shared\Interfaces;

interface ApiInterface
{
    public function find($id);
    public function index();
    public function show($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($id);   
}
