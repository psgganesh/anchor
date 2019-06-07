<?php

namespace App\Modules\Account\Repositories\User;

use App\Modules\Account\Models\User;
use App\Modules\Account\Repositories\User\UserRepositoryInterface;
use App\Modules\Account\Transformers\User\UserTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UserRepository implements UserRepositoryInterface
{
    private $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function find($id)
    {
        $record = $this->user->find($id);
    
        if(empty($record)) {
            throw new ModelNotFoundException();
        }
    
        return $record;
    }
    
    public function index()
    {
        $paginator = $this->user->paginate(20);
    
        $data = fractal()
            ->collection($paginator->getCollection())
            ->transformWith(new UserTransformer() )
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    
        return $data;
    }
    
    public function show($id)
    {
        $record = $this->find($id);
            
        $data = fractal($record, new UserTransformer())->toArray();
    
        return $data;
    }
    
    public function store($request)
    {
        $user = $this->user->create([
            // Additional columns
            'created_at' => Carbon::now()
        ])->fresh();
        
        $data = fractal($user, new UserTransformer())->toArray();
    
        return $data;
    }
    
    public function update($request, $id)
    {
        $user = $this->find($id);
    
        $updatedData = [
            // Additional columns
            'updated_at' => Carbon::now()
        ];
        $user->update($updatedData);
    
        $data = fractal($user, new UserTransformer())->toArray();
    
        return $data;
    }
    
    public function destroy($id)
    {
        $user = $this->find($id);
    
        $user->delete();
        
        return true;
    }
}
