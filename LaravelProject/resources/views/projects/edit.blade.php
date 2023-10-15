@extends('layouts.master')

@section('title')
    Edit Project
@endsection

@section('heading')
<h1>Edit Project</h1>
@endsection


@section('content')

    <form method="POST" action='{{url("project/$project->id")}}'>
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <p>
            <label>Title: </label>
            <input type="text" name="title" value="{{($project->title)}}">
            @if(count($errors->get('title'))>0)
                {{ ($errors->first('title')) }}
            @endif
        </p>
        <p>
            <label>Description: </label>
            <input type="text" name="description" value="{{($project->description)}}">
            @if(count($errors->get('description'))>0)
                {{ ($errors->first('description')) }}
            @endif
        </p>    
        <p>
            <label>Number of student needed: </label>
            <input type="text" name="number_of_student_needed" value="{{($project->number_of_student_needed)}}">
            @if(count($errors->get('number_of_student_needed'))>0)
                {{ ($errors->first('number_of_student_needed')) }}
            @endif
        </p> 
        <p>
            <label>Offering trimester: </label>
            <input type="text" name="offering_trimester" value="{{($project->offering_trimester)}}">
            @if(count($errors->get('offering_trimester'))>0)
                {{ ($errors->first('offering_trimester')) }}
            @endif
        </p> 
        <p>
            <label>Offering year: </label>
            <input type="text" name="offering_year" value="{{($project->offering_year)}}">
            @if(count($errors->get('offering_year'))>0)
                {{ ($errors->first('offering_year')) }}
            @endif
        </p> 

        <input type="submit" value="Update"> 
    </form>
@endsection