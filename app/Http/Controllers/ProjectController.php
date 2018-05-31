<?php

namespace App\Http\Controllers;

use App\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of all resources.
     *
     */
    public function index() 
    {
        $projects = Project::where('systemID', app('system')->id)->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Display a page to add a new project
     *
     */
    public function create() 
    {
        return view('projects.create');
    }

    /**
     * Display a page to add a new project
     *
     */
    public function store(Request $request) 
    {
        //dd($request->all());

        $newproject = Project::create([
            'name' => $request['name'],
            'systemID' => app('system')->id, // from appServiceprovider
            'description' => $request['description'],
            'location' => $request['location'],
            'city' => $request['city'],
            'state' => $request['state'],
            'imageFileName' => null,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        
        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');

            if($file) {
                $filename = 'project' . '_' . app('system')->id . '_' . $newproject->id . '_' . $file->getClientOriginalName();

                $stored = Storage::disk('public')->put($filename, File::get($file));

                $project = Project::find($newproject->id);
                $project->imageFileName = $filename;

                if($stored)
                    $project->imageFileName = $filename;
                else
                    $project->imageFileName = "file not stored";

                $project->save();
            }                
        }
        return redirect('projects');
    }

    /**
     * Display a page to edit a new project
     *
     */
    public function edit($id) 
    {
        $project = Project::find($id);
        //return($user);
        return view('projects.edit')->with('project', $project);

    }

    /**
     * Display a page to edit a new project
     *
     */
    public function update(Request $request) 
    {
       
        $project = Project::find($request['id']);
        
            $project->name = $request['name'];
            $project->description = $request['description'];
            $project->location = $request['location'];
            $project->city = $request['city'];
            $project->state = $request['state'];


            if($request->hasFile('imageFileName')) {
                $file = $request->file('imageFileName');

                if($file) {
                    $filename = 'project' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();                    //$filename = $destinationPath . '/' . $filename;

                    $stored = Storage::disk('public')->put($filename, File::get($file));
                    
                    if($stored)
                        $project->imageFileName = $filename;
                    else
                        $project->imageFileName = null;
                    }                
            }

            $project->updated_at = Carbon::now()->toDateTimeString();
            $project->save();

            return redirect('projects');
        }

        /**
         * Display a page to delete a project
         *
         */
        public function destroy($id) 
        {
            $project = Project::find($id);
            
            Storage::delete($project->imageFileName);

            project::destroy($id);
            
            $projects = Project::where('systemID', app('system')->id)->get();
            return view('projects.index', compact('projects'));
        }
}
