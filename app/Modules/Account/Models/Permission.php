<?php

namespace App\Modules\Account\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as IsAutidable;

class Permission extends \Spatie\Permission\Models\Permission implements Auditable
{
    use IsAutidable;

    protected $table = "permissions";

    protected $guarded = [
        'id'
    ];

    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_permissions',
            'add_permissions',
            'edit_permissions',
            'delete_permissions',

            'view_events',
            'add_events',
            'edit_events',
            'delete_events',

            'view_pages',
            'add_pages',
            'edit_pages',
            'delete_pages',

            'view_terms',
            'add_terms',
            'edit_terms',
            'delete_terms',

            'view_rules',
            'add_rules',
            'edit_rules',
            'delete_rules',

            'view_own_records_only',
        ];
    }
}
