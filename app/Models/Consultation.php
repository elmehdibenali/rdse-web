<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Service;


class Consultation extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'proposed_datetime',
        'user_response',
        'status',
        'consultation_link',
       'retried_from_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function offer(){
        return $this->hasOne(Offer::class);
    }
}
