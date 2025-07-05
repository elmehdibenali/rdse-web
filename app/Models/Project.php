<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'project_date'

    ];
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
