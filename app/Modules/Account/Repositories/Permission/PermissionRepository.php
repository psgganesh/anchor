<?php

namespace App\Modules\Account\Repositories\Permission;

use App\Modules\Account\Models\Permission;
use App\Modules\Account\Repositories\Permission\PermissionRepositoryInterface;
use App\Modules\Account\Transformers\Permission\PermissionTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function getAllPermissions()
    {
        $permissions = new Permission();

        $paginator = $permissions->paginate(20);

        $data = fractal()
            ->collection($paginator->getCollection())
            ->transformWith(new PermissionTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();

        return $data;
    }
}
