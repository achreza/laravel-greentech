<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresenterPayment extends Model
{
    use HasFactory;
    protected $table = 'presenter_payment';
    protected $primaryKey = 'id_presenter_payment';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}