<?php

namespace App\Http\Controllers;

use App\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of all images.
     *
     */
    public function index() 
    {
        $images = Image::where('systemID', app('system')->id)->orderBy('created_at', 'DESC')->get();
        return view('images.index', compact('images'));
    }

     /**
     * Display a page to add a new user
     *
     */
    public function create() 
    {

        return view('images.create');
    }

    /**
     * Display a page to add a new user
     *
     */
    public function store(Request $request) 
    {
        //dd($request->all());

        $newImage = Image::create([
            'title' => $request['title'],
            'systemID' => app('system')->id, // from appServiceprovider
            'imageFileName' => $request['imageFileName'],
            'categoryID' => $request['categoryID'],
            'projectID' => $request['projectID'],
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        
        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');

            if($file) {
                $filename = 'image' . '_' . app('system')->id . '_' . $newImage->id . '_' . $file->getClientOriginalName();

                $stored = Storage::disk('public')->put($filename, File::get($file));

                $image = Image::find($newImage->id);
                $image->imageFileName = $filename;

                if($stored)
                    $image->imageFileName = $filename;
                else
                    $image->imageFileName = "file not stored";

                $image->save();
            }                
        }
        return redirect('images');
    }
    
}
