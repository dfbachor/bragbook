<?php

namespace App\Http\Controllers;

use App\Image;
use App\Project;
use App\Category;
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
        $images = Image::join('categories', 'images.categoryID', 'categories.id')
                    ->join('projects', 'images.projectID', 'projects.id')
                    ->select('images.id', 'images.imageFileName', 'images.title', 'images.created_at', 'categories.name as categoryName', 'projects.name as projectName')
                    ->where('images.systemID', app('system')->id)->orderBy('images.created_at', 'DESC')->get();

        //$categories = Category::where('systemID', app('system')->id)->get();

        return view('images.index')
            ->with(compact('images')) 
            ->with(compact('categories')); 
    }

     /**
     * Display a page to add a new user
     *
     */
    public function create() 
    {

        $categories = Category::where('systemID', app('system')->id)->get(['id', 'name']);
        $projects = Project::where('systemID', app('system')->id)->get(['id', 'name']);


        return view('images.create')
                ->with(compact('categories', $categories)) 
                ->with(compact('projects', $projects)) 
        ;
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
