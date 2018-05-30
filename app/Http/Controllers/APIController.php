<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class APIController extends Controller
{
    public function getImage($filename) {
        $file = Storage::disk('public')->get($filename); 
        
        return ($File);
        return new Response($file, 200);
     }
}
