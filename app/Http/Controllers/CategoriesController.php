<?php

namespace App\Http\Controllers;

use App\Category;
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
}
