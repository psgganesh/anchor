<?php

namespace App\Modules\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * Table name
     */
    protected $table = "modules";

    /**
     * The attributes that are protected
     * against mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'  
    ];
}
