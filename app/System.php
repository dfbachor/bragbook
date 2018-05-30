<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = [
        'name', 'systemID', 'email', 'password', 'imageFileName'
    ];

}
