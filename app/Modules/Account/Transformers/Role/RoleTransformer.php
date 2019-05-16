<?php

namespace App\Modules\Account\Transformers\Role;

use App\Modules\Account\Models\Role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
{
    public function transform(Role $role)
    {
        return [
            'name' => $role['name'],
            'guard_name' => $role['guard_name']
        ];
    }
}
