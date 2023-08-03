<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeerReview extends Model
{
    use HasFactory;
    protected $table = 'peer_reviews';
    protected $primaryKey = 'id_peer_reviews';
    protected $guarded = [];

    public function paper()
    {
        return $this->belongsTo(Paper::class, 'id_paper');
    }
}