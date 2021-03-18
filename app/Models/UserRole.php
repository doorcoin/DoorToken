<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    public const ADMINISTRATOR = 1;
    public const OWNER = 2;
    public const USER = 3;

    public $timestamps = false;

    protected $table = 'userrole';

    public static function GetRole($role_id)
    {
        $role = UserRole::where('id', $role_id)
                    ->first();
        return $role;
    }
}
