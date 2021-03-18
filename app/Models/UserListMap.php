<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lists;

class UserListMap extends Model
{
    use HasFactory;

    protected $table = "user_list_map";
}
