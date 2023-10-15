@extends('layouts.master')

@section('title')
  {{$profile->User->name}}
@endsection

@section('heading')
    <h1>{{$user = $profile->User->name}}'s Profile</h1>
@endsection

@section('content')

    <p><b>GPA: {{$profile->grade_point_average}}</b></p>

    @Auth
        @php
            $type = Auth::user()->user_type->name;
            $login_name = Auth::user()->name;
        @endphp
        @if ($type == 'Student')
            @if ($login_name == $user)
                <a href=' {{url("student_profile/$profile->id/edit")}}'>Update</a><br><br>

            @endif
        @endif
    @endauth


@endsection