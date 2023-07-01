<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submission_abstrak';
    protected $primaryKey = 'id_abs_submission';
    protected $fillable = [
        'topic',
        'judul',
        'abstrak',
        'file_abs',
        'comment',
        'submited_at',
        'decission_by',
        'decission_at',
        'id_user',
    ];
    public $timestamps = true;
}
