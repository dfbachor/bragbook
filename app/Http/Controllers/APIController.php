<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class APIController extends Controller
{
    public function getImage($filename) {
        $file = Storage::disk('local')->get($filename); 
         return new Response($file, 200);
     }
}
