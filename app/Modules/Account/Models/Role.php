<?php

namespace App\Modules\Account\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as IsAutidable;

class Role extends \Spatie\Permission\Models\Role implements Auditable
{
    use IsAutidable;
    
    protected $table = "roles";
}
