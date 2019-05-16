<?php

namespace App\Modules\Account\Transformers\Permission;

use App\Modules\Account\Models\Permission;
use League\Fractal\TransformerAbstract;

class PermissionTransformer extends TransformerAbstract
{
    public function transform(Permission $permission)
    {
        return [
            'name' => $permission['name'],
            'guard_name' => $permission['guard_name']
        ];
    }
}
