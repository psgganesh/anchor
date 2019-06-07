<?php

namespace App\Modules\Account\Repositories\Role;

use App\Modules\Account\Models\Role;
use App\Modules\Account\Repositories\Role\RoleRepositoryInterface;
use App\Modules\Account\Transformers\Role\RoleTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class RoleRepository implements RoleRepositoryInterface
{
    private $role;
    
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    
    public function find($id)
    {
        $record = $this->role->find($id);
    
        if(empty($record)) {
            throw new ModelNotFoundException();
        }
    
        return $record;
    }
    
    public function index()
    {
        $paginator = $this->role->paginate(20);
    
        $data = fractal()
            ->collection($paginator->getCollection())
            ->transformWith(new RoleTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    
        return $data;
    }
    
    public function show($id)
    {
        $record = $this->find($id);
            
        $data = fractal($record, new RoleTransformer())->toArray();
    
        return $data;
    }
    
    public function store($request)
    {
        $role = $this->role->create([
            // Additional columns
            'created_at' => Carbon::now()
        ])->fresh();
        
        $data = fractal($role, new RoleTransformer())->toArray();
    
        return $data;
    }
    
    public function update($request, $id)
    {
        $role = $this->find($id);
    
        $updatedData = [
            // Additional columns
            'updated_at' => Carbon::now()
        ];
        $role->update($updatedData);
    
        $data = fractal($role, new RoleTransformer())->toArray();
    
        return $data;
    }
    
    public function destroy($id)
    {
        $role = $this->find($id);
    
        $role->delete();
        
        return true;
    }
}
