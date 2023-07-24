<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submission_abstrak';
    protected $primaryKey = 'id_abs_submission';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'id_topic');
    }

    public function status()
    {
        return $this->belongsTo(StatusAbstract::class, 'id_status_abs');
    }

    public function decission()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}