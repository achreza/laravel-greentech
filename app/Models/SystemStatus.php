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

    public function abs_submissions()
    {
        return $this->hasMany(Submission::class, 'id_abs_submission');
    }
}