<?php

namespace App\Modules\Account\Repositories\Permission;

use App\Modules\Account\Repositories\Permission\PermissionRepository;

class TestPermissionRepository extends PermissionRepository
{
    public function getAllPermissions()
    {
        return [
            (object)[
                'name' => "view_users",
                'guard_name' => "web"
            ]
        ];
    }
}
