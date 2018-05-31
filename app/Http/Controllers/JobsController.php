<?php

namespace App\Http\Controllers;

use App\Job;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of all resources.
     *
     */
    public function index() 
    {
        $jobs = Job::where('systemID', app('system')->id)->get();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Display a page to add a new job
     *
     */
    public function create() 
    {
        return view('jobs.create');
    }

    /**
     * Display a page to add a new job
     *
     */
    public function store(Request $request) 
    {
        //dd($request->all());

        $newjob = Job::create([
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
                $filename = 'job' . '_' . app('system')->id . '_' . $newjob->id . '_' . $file->getClientOriginalName();

                $stored = Storage::disk('public')->put($filename, File::get($file));

                $job = Job::find($newjob->id);
                $job->imageFileName = $filename;

                if($stored)
                    $job->imageFileName = $filename;
                else
                    $job->imageFileName = "file not stored";

                $job->save();
            }                
        }
        return redirect('jobs');
    }

    /**
     * Display a page to edit a new job
     *
     */
    public function edit($id) 
    {
        $job = Job::find($id);
        //return($user);
        return view('jobs.edit')->with('job', $job);

    }

    /**
     * Display a page to edit a new job
     *
     */
    public function update(Request $request) 
    {
       
        $job = Job::find($request['id']);
        
            $job->name = $request['name'];
            $job->description = $request['description'];
            $job->location = $request['location'];
            $job->city = $request['city'];
            $job->state = $request['state'];


            if($request->hasFile('imageFileName')) {
                $file = $request->file('imageFileName');

                if($file) {
                    $filename = 'job' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();                    //$filename = $destinationPath . '/' . $filename;

                    $stored = Storage::disk('public')->put($filename, File::get($file));
                    
                    if($stored)
                        $job->imageFileName = $filename;
                    else
                        $job->imageFileName = null;
                    }                
            }

            $job->updated_at = Carbon::now()->toDateTimeString();
            $job->save();

            return redirect('jobs');
        }

        /**
         * Display a page to delete a job
         *
         */
        public function destroy($id) 
        {
            $job = Job::find($id);
            
            Storage::delete($job->imageFileName);

            Job::destroy($id);
            
            $jobs = Job::where('systemID', app('system')->id)->get();
            return view('jobs.index', compact('jobs'));
        }
}
