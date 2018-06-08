<?php

namespace App\Http\Controllers;

use App\Image;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
     /**
     * Display a listing of all categories.
     *
     */
    public function index($id) 
    {
        if($id != '0') {
            $currentCategory = Category::where('systemID', app('system')->id)
                                        ->where('categories.id', $id)
                                        ->get()
                                        ->first();
            $currentCategoryID = $currentCategory->id;
            $currentCategoryName = $currentCategory->Name;
        } else {
            $currentCategoryID = 0;
            $currentCategoryName = "Select Category";
        }

        $images = Image::join('categories', 'images.categoryID', 'categories.id')
                    ->join('projects', 'images.projectID', 'projects.id')
                    ->select('images.id', 'images.imageFileName', 'images.title', 'images.created_at', 'categories.name as categoryName', 'projects.name as projectName')
                    ->where('images.systemID', app('system')->id)
                    ->where('categories.id', $id)
                    ->orderBy('images.created_at', 'DESC')->get();

        $categories = Category::where('systemID', app('system')->id)->get();

        return view('categories.index')
            ->with(compact('categories'))
            ->with(compact('images'))
            ->with(['currentCategoryID'=>$currentCategoryID])
            ->with(['currentCategoryName'=>$currentCategoryName]); // category name not showing
    }

    /**
     * Display a page to add a new category
     *
     */
    public function create() 
    {

        return view('categories.create');
    }

    /**
     * Display a page to add a new category
     *
     */
    public function store(Request $request) 
    {
        //dd($request->all());

        $newCategory = Category::create([
            'name' => $request['name'],
            'systemID' => app('system')->id, // from appServiceprovider
            'categoryname' => $request['categoryname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'imageFileName' => null,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        
        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');

            if($file) {
                $filename = 'category' . '_' . app('system')->id . '_' . $newCategory->id . '_' . $file->getClientOriginalName();

                $stored = Storage::disk('public')->put($filename, File::get($file));

                $category = Category::find($newCategory->id);
                $category->imageFileName = $filename;

                if($stored)
                    $category->imageFileName = $filename;
                else
                    $category->imageFileName = "file not stored";

                $category->save();
            }                
        }
        return redirect('categories');
    }
}
