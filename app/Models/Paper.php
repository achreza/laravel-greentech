<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $table = 'papers';
    protected $primaryKey = 'id_paper';
    protected $guarded = [];

    public function submitter()
    {
        return $this->belongsTo(User::class, 'submitter');
    }

    public function abstrak()
    {
        return $this->belongsTo(Submission::class, 'id_abstrak');
    }
}