<?php

namespace App\Modules\Account\Repositories\Permission;

use App\Modules\Account\Models\Permission;
use App\Modules\Account\Repositories\Permission\PermissionRepositoryInterface;
use App\Modules\Account\Transformers\Permission\PermissionTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class PermissionRepository implements PermissionRepositoryInterface
{
    private $permission;
    
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    
    public function find($id)
    {
        $record = $this->permission->find($id);
    
        if(empty($record)) {
            throw new ModelNotFoundException();
        }
    
        return $record;
    }
    
    public function index()
    {
        $paginator = $this->permission->paginate(20);
    
        $data = fractal()
            ->collection($paginator->getCollection())
            ->transformWith(new PermissionTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    
        return $data;
    }
    
    public function show($id)
    {
        $record = $this->find($id);
            
        $data = fractal($record, new PermissionTransformer())->toArray();
    
        return $data;
    }
    
    public function store($request)
    {
        $permission = $this->permission->create([
            // Additional columns
            'created_at' => Carbon::now()
        ])->fresh();
        
        $data = fractal($permission, new PermissionTransformer())->toArray();
    
        return $data;
    }
    
    public function update($request, $id)
    {
        $permission = $this->find($id);
    
        $updatedData = [
            // Additional columns
            'updated_at' => Carbon::now()
        ];
        $permission->update($updatedData);
    
        $data = fractal($permission, new PermissionTransformer())->toArray();
    
        return $data;
    }
    
    public function destroy($id)
    {
        $permission = $this->find($id);
    
        $permission->delete();
        
        return true;
    }
}
