<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use App\Models\Project;
use App\Models\File;
use App\Models\Image;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{


    public function __construct() {
        $this->middleware('approvedInP', ['only'=>['create']]);
        }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::All();

        $years_trimesters = DB::table('projects')
        ->select('offering_year', 'offering_trimester')
        ->groupBy('offering_year', 'offering_trimester')
        ->orderBy('offering_year', 'desc')
        ->orderBy('offering_trimester', 'desc')
        ->get();

        return view('projects.index')->with('projects', $projects)->with('years_trimesters', $years_trimesters);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // 
        $this->validate($request, [
            'title' => ['required', 'min:6', 
            Rule::unique('projects')->where('offering_trimester', $request->offering_trimester)->where('offering_year', $request->offering_year)],
            'description' => ['required', 'min:3'], 
            'number_of_student_needed' => ['required', 'numeric', 'between:3,6'],
            'offering_trimester' => ['required', 'numeric', 'between:1,3'],
            'offering_year' => ['required', 'numeric', 'between:2023,2025'],    
            'user_id' => ['exists:users,id'],
        ]);


        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->number_of_student_needed = $request->number_of_student_needed;
        $project->offering_trimester = $request->offering_trimester;    
        $project->offering_year = $request->offering_year;    
        $project->user_id = $request->user_id;
        $project->save();
        
        if ($request->images >= 1){

            foreach ($request->images as $image){
                $image_store = $image->store('projects_images', 'public');

                $image = new Image();
                $image->image_path = $image_store;
                $image->project_id = $project->id;
                $image->save();

            }
        }

        if ($request->file('files') >= 1){

            foreach ($request->file('files') as $file){
                $file_store = $file->store('projects_files', 'public');

                $file = new File();
                $file->file_path = $file_store;
                $file->project_id = $project->id;
                $file->save();

            }
        }


        return redirect("project/$project->id");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $project = Project::find($id);
        $applications = Application::where('project_id', $id)->get();
        $files = File::where('project_id', $id)->pluck('file_path');
        $images = Image::where('project_id', $id)->pluck('image_path');

    
        return view('projects.show')->with('project', $project)->with('files', $files)->with('images', $images)->with('applications', $applications);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $project = Project::find($id);
        return view('projects.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 
        $this->validate($request, [
            'title' => ['required', 'min:6', 
            Rule::unique('projects')->where('offering_trimester', $request->offering_trimester)->where('offering_year', $request->offering_year)],
            'description' => ['required', 'min:3'], 
            'number_of_student_needed' => ['required', 'numeric', 'between:3,6'],
            'offering_trimester' => ['required', 'numeric', 'between:1,3'],
            'offering_year' => ['required', 'numeric', 'between:2023,2025'],    
            'user_id' => ['exists:users,id'],
        ]);


        $project = Project::find($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->number_of_student_needed = $request->number_of_student_needed;
        $project->offering_trimester = $request->offering_trimester;    
        $project->offering_year = $request->offering_year;    
        $project->user_id = Auth::user()->id;
        $project->save();
        return redirect("project/$project->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //


        // Count the existing applications for the user
        $ApplicationsCount = Application::where('project_id', $id)->count();


        // Check if the user has reached the maximum limit
        if ($ApplicationsCount >= 1) {
            // User has reached the limit, return a validation error
            return redirect()->back()->withErrors(['projects' => 'application is exsit.']);
    }



        $project = Project::find($id); 
        $project->delete();
        return redirect("/");
    }
}
