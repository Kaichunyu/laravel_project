@extends('layouts.master')

@section('title')
    Edit Profile
@endsection

@section('heading')
<h1>Edit Profile</h1>
@endsection

@section('content')
    <form method="POST" action='{{url("student_profile/$profile->id")}}'>
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <p>
            <label>GPA: </label>
            <input type="text" name="grade_point_average" value="{{($profile->grade_point_average)}}">
            @if(count($errors->get('grade_point_average'))>0)
                {{ ($errors->first('grade_point_average')) }}
            @endif
        </p>
        <p>
            <label>Select roles: </label>
            <select name="role" multiple>
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
            </select>
        </p>

        <input type="submit" value="Update"> 
    </form>
@endsection
