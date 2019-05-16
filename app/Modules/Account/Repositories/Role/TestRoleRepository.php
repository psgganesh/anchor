<?php

namespace App\Modules\Account\Repositories\Role;

use App\Modules\Account\Repositories\Role\RoleRepository;

class TestRoleRepository extends RoleRepository
{
    public function getAllRoles()
    {
        return [
            (object)[
                'name' => "admin",
                'guard_name' => "web"
            ]
        ];
    }
}
