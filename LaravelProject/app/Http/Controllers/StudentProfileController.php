<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\StudentProfile;
use App\Models\User;


class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profiles = StudentProfile::all();
        return view('student_profiles.index')->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::All();
        return view('student_profiles.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $profile = StudentProfile::where('user_id', $id)->first();
        $profile = StudentProfile::find($id);
    
        return view('student_profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $profile = StudentProfile::find($id);

        $roles = Role::All();

        return view('student_profiles.edit')->with('profile', $profile)->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'grade_point_average' => ['required', 'numeric', 'between:0,7']
        ]);

        $profile = StudentProfile::find($id);
        $profile->grade_point_average = $request->grade_point_average;
        $profile->save();

        return redirect("student_profile/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
