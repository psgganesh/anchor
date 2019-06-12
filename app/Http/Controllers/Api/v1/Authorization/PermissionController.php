<?php

namespace App\Http\Controllers\Api\v1\Authorization;

use App\Http\Controllers\Api\ApiController;
use App\Modules\Account\Repositories\Permission\PermissionRepositoryInterface;
use App\Modules\Account\Requests\PermissionRequest;

class PermissionController extends ApiController
{
    private $permissionRepository;
    
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all records
        $records = $this->permissionRepository->index();
        
        // Return a collection of $records
        return $this->respond($records, 200, trans('api.generic.index.success', ['resource' => 'permissions']));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Modules\Account\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        // Save record
        $record = $this->permissionRepository->store($request);
    
        // Return the fresh instance of new record created
        return $this->respond($record, 200, trans('api.generic.store.success', ['resource' => 'permission']));
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
        $record = $this->permissionRepository->show($id);
    
        // Return a record data
        return $this->respond($record, 200, trans('api.generic.show.success', ['resource' => 'permission']));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Modules\Account\Requests\PermissionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        // Update record
        $record = $this->permissionRepository->update($request, $id);
    
        // Return the instance of updated record
        return $this->respond($record, 200, trans('api.generic.update.success', ['resource' => 'permission']));
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
        $this->permissionRepository->destroy($id);
    
        // Return deleted message
        return $this->respondNoContent(trans('api.generic.destroy.success', ['resource' => 'permission']));
    }
}
