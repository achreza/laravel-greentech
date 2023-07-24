<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAbstract extends Model
{
    use HasFactory;
    protected $table = "m_status_abs";
    protected $primaryKey = "id_status_abs";
    protected $guarded = [];

    public function submission()
    {
        return $this->hasMany(Submission::class, 'id_abs_submission');
    }
}