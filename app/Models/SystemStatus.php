<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemStatus extends Model
{
    use HasFactory;

    protected $table = 'system_status';
    protected $fillable = ['abs_submissions', 'payment'];
    public $timestamps = true;
}
