<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'systemID', 'name', 'description', 'location', 'city', 'state', 'imageFileName',
    ];
}
