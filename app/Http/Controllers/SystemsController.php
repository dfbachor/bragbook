<?php

namespace App\Http\Controllers;

use App\System;
use Illuminate\Http\Request;

class SystemsController extends Controller
{
    
    public function edit() {
        
        $system = System::where('id', '=', app('system')->id)->get()->first();
        return view('system.edit')->with('system', $system);
    }

    public function update(Request $request) 
    {
        //return($request->all());
         $system = System::find($request['id']);
        
         $system->companyName = $request['companyName'];
         $system->email = $request['email'];


         if($request->hasFile('companyLogo')) {
            $file = $request->file('companyLogo');

            if($file) {
                //$destinationPath = 'uploads';
                $filename = 'system' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();
                // $file->move($destinationPath, $filename);  
                // $filename = $destinationPath . '/' . $filename;
                
                $stored = Storage::disk('local')->put($filename, File::get($file));

                if($stored)
                    $system->imageFileName = $filename;
                else
                    $system->imageFileName = "file not stored";

            }                
        }

         $system->operatorUserName = "dfb"; // Auth::user()->username;
         $system->updated_at = Carbon::now()->toDateTimeString();
         $system->save();

         $system = DB::table('systems')->where('id', '=', $request['id'])->get();
         return view('system.edit', compact('system')); 
    }
}
