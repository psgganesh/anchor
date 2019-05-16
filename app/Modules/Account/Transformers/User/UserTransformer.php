<?php

namespace App\Modules\Account\Transformers\User;

use App\Modules\Account\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'name' => $user['name'],
            'email' => $user['email']
        ];
    }
}
