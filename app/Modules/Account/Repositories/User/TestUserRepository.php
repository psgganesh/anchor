<?php

namespace App\Modules\Account\Repositories\User;

use App\Modules\Account\Repositories\User\UserRepository;

class TestUserRepository extends UserRepository
{
    public function getAllUsers()
    {
        return [
            (object)[
                'name' => 'Administrator',
                'email' => 'admin@sph-events.test'
            ]
        ];
    }
}
