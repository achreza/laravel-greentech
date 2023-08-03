<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantPayment extends Model
{
    use HasFactory;
    protected $table = 'participant_payments';
    protected $primaryKey = 'id_participant_payment';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_participant');
    }
}