<?php

namespace App\Http\Controllers;

use App\System;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class SystemsController extends Controller
{
    
    public function edit() {
        
        $system = System::where('id', '=', app('system')->id)->get()->first();
        return view('system.edit')->with('system', $system);
    }

    public function update(Request $request) 
    {
         $system = System::find(app('system')->id);
        
         $system->companyName = $request['companyName'];
         $system->email = $request['email'];

         if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');

            if($file) {
                $filename = 'system' . '_' . app('system')->id . '_' . app('system')->id  . '_' . $file->getClientOriginalName();

                $stored = Storage::disk('public')->put($filename, File::get($file));

                if($stored)
                    $system->imageFileName = $filename;
                else
                    $system->imageFileName = "file not stored";
            }                
        }

         $system->updated_at = Carbon::now()->toDateTimeString();
         

         $system->save();
         //return($request['companyName']);
         sleep(1);

         $system = System::where('id', '=', app('system')->id)->get()->first();
         return view('system.edit')->with('system', $system);
     }
}
