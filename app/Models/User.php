<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'm_user';
    protected $primaryKey = 'id_user';

    protected $guarded = [];

    public function submission()
    {
        return $this->hasMany(Submission::class, 'id_abs_submission');
    }

    public function participantPayment()
    {
        return $this->hasMany(ParticipantPayment::class, 'id_participant_payment');
    }

    public function paper()
    {
        return $this->hasMany(Paper::class, 'id_paper');
    }

    public function role()
    {
        return $this->belongsTo(RoleUser::class, 'id_role_user');
    }
}