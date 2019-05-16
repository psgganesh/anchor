<?php

namespace App\Modules\Account\Repositories\Role;

use App\Modules\Account\Models\Role;
use App\Modules\Account\Repositories\Role\RoleRepositoryInterface;
use App\Modules\Account\Transformers\Role\RoleTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAllRoles()
    {
        $roles = new Role();

        $paginator = $roles->paginate(20);

        $data = fractal()
            ->collection($paginator->getCollection())
            ->transformWith(new RoleTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();

        return $data;
    }
}
