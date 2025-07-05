<?php

namespace App\Models;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'consultation_id',
        'pdf_path',
        'status',
    ];


    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
