<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Application;
use App\Models\Role;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $applications = Application::All();
        return  view('applications.index')->with('applications', $applications);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user()->id;

        $profile = StudentProfile::where('user_id', $user)->first();
    

        if ($profile){
            $projects = Project::All();
            return view('applications.create')->with('projects', $projects);
        }

        $roles = DB::table('roles')->get();

        $projects = Project::All();
        return view('student_profiles.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'justification' => ['required', 'max:100'], 
            'user_id' => ['exists:users,id'],
            'project_id' => ['exists:projects,id'],
        ]);

        $userId = $request->user_id;

        // Count the existing applications for the user
        $userApplicationsCount = Application::where('user_id', $userId)->count();

        // Define the maximum allowed applications
        $maxApplications = 3;

        // Check if the user has reached the maximum limit
        if ($userApplicationsCount >= $maxApplications) {
            // User has reached the limit, return a validation error
            return redirect()->back()->withErrors(['applications' => 'You have reached the maximum limit of applications.']);
    }


        $application = new Application();
        $application->justification = $request->justification;
        $application->user_id = $request->user_id;
        $application->project_id = $request->project_id;
        $application->save();
        return redirect("/application");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
