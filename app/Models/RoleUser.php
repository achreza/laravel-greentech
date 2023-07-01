<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $primaryKey = 'id_role_user';
    public $timestamps = true;

    protected $fillable = [
        'nama_role',
    ];
}
