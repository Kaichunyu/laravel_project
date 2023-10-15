@extends('layouts.master')

@section('title')
    Apply for Project
@endsection

@section('content')
    <h1>Application for Project</h1>
    <form method="POST" action='{{url("application")}}'>
        {{csrf_field()}}
        @if (count($errors) > 0)
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <p>
            <label>Student Name: {{$user = Auth::user()->name}}</label>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </p>
        <p>
            <label>Justification: </label>
            <input type="text" name="justification" value="justification">
        </p> 

        <p>
            <label>Project Name: </label>
            <select name="project_id">
            @foreach ($projects as $project)
                <option value="{{$project->id}}">{{$project->title}}</option>
            @endforeach
            </select>
        </p>

        <input type="submit" value="Create"> 
    </form>
@endsection