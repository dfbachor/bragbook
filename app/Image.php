<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'systemID', 'title', 'categoryID', 'projectID', 'imageFileName',
    ];
}
