<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
     /**
     * Display a listing of all categories.
     *
     */
    public function index() 
    {
        $categories = Category::where('systemID', app('system')->id)->get();
        return view('categories.index', compact('categories'));
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
