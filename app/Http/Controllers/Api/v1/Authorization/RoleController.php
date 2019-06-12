<?php

namespace App\Http\Controllers\Api\v1\Authorization;

use App\Http\Controllers\Api\ApiController;
use App\Modules\Account\Repositories\Role\RoleRepositoryInterface;
use App\Modules\Account\Requests\RoleRequest;

class RoleController extends ApiController
{
    private $roleRepository;
    
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all records
        $records = $this->roleRepository->index();
        
        // Return a collection of $records
        return $this->respond($records, 200, trans('api.generic.index.success', ['resource' => 'roles']));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Modules\Account\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        // Save record
        $record = $this->roleRepository->store($request);
    
        // Return the fresh instance of new record created
        return $this->respond($record, 200, trans('api.generic.store.success', ['resource' => 'role']));
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
        $record = $this->roleRepository->show($id);
    
        // Return a record data
        return $this->respond($record, 200, trans('api.generic.show.success', ['resource' => 'role']));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Modules\Account\Requests\RoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(/*Form Request Class*/ $request, $id)
    {
        // Update record
        $record = $this->roleRepository->update($request, $id);
    
        // Return the instance of updated record
        return $this->respond($record, 200, trans('api.generic.update.success', ['resource' => 'role']));
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
        $this->roleRepository->destroy($id);
    
        // Return deleted message
        return $this->respondNoContent(trans('api.generic.destroy.success', ['resource' => 'role']));
    }
}
