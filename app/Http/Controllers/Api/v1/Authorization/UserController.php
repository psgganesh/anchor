<?php

namespace App\Http\Controllers\Api\v1\Authorization;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Modules\Account\Repositories\User\UserRepositoryInterface;
use App\Modules\Account\Requests\UserRequest;
use App\Modules\Account\Requests\UserUpdateRequest;

class UserController extends ApiController
{
    private $userRepository;
    
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all records
        $records = $this->userRepository->index();
        
        // Return a collection of $records
        return $this->respond($records, 200, trans('api.generic.index.success', ['resource' => 'users']));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Modules\Account\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // Save record
        $record = $this->userRepository->store($request);
    
        // Return the fresh instance of new record created
        return $this->respond($record, 200, trans('api.generic.store.success', ['resource' => 'user']));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get one record
        $record = $this->userRepository->show($id);
    
        // Return a record data
        return $this->respond($record, 200, trans('api.generic.show.success', ['resource' => 'user']));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Modules\Account\Requests\UserUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        // Update record
        $record = $this->userRepository->update($request, $id);
    
        // Return the instance of updated record
        return $this->respond($record, 200, trans('api.generic.update.success', ['resource' => 'user']));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete record
        $this->userRepository->destroy($id);
    
        // Return deleted message
        return $this->respondNoContent(trans('api.generic.destroy.success', ['resource' => 'user']));
    }
}
