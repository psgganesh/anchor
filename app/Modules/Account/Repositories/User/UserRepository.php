<?php

namespace App\Modules\Account\Repositories\User;

use App\Modules\Account\Models\User;
use App\Modules\Account\Repositories\User\UserRepositoryInterface;
use App\Modules\Account\Transformers\User\UserTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        $users = new User();

        $paginator = $users->paginate(20);

        $data = fractal()
            ->collection($paginator->getCollection())
            ->transformWith(new UserTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();

        return $data;
    }
}
