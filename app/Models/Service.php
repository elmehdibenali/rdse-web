<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'icon',
        'name',
        'description',

    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
