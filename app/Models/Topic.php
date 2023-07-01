<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topic';
    protected $primaryKey = 'id_topic';
    protected $fillable = ['nama_topic'];
    public $timestamps = true;
}
