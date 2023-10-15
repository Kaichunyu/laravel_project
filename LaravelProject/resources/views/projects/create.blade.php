@extends('layouts.master')

@section('title')
    Create Project
@endsection


@section('heading')
<h1>Create Project</h1>
@endsection

@section('content')
    <h1>Create Project</h1>
    <form method="POST" action='{{url("project")}}' enctype="multipart/form-data">
        {{csrf_field()}}
        <p>
            <label>Title: </label>
            <input type="text" name="title" value="{{old('title')}}">
            @if(count($errors->get('title'))>0)
                {{ ($errors->first('title')) }}
            @endif
        </p>
        <p>
            <label>Description: </label>
            <input type="text" name="description" value="{{old('description')}}">
            @if(count($errors->get('description'))>0)
                {{ ($errors->first('description')) }}
            @endif
        </p>    
        <p>
            <label>Number of student needed: </label>
            <input type="text" name="number_of_student_needed" value="{{old('number_of_student_needed')}}">
            @if(count($errors->get('number_of_student_needed'))>0)
                {{ ($errors->first('number_of_student_needed')) }}
            @endif
        </p> 
        <p>
            <label>Offering trimester: </label>
            <input type="text" name="offering_trimester" value="{{old('offering_trimester')}}">
            @if(count($errors->get('offering_trimester'))>0)
                {{ ($errors->first('offering_trimester')) }}
            @endif
        </p> 
        <p>
            <label>Offering year: </label>
            <input type="text" name="offering_year" value="{{old('offering_year')}}">
            @if(count($errors->get('offering_year'))>0)
                {{ ($errors->first('offering_year')) }}
            @endif
        </p> 
        <p>
            <label>Industry Partner Name: {{$user = Auth::user()->name}}</label>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </p> 
        <p>
            <label>Industry Partner Email Address: {{$user = Auth::user()->email}}</label>
        </p> 



        {{csrf_field()}}
        <p>
            <label>Upload Images: </label>
            <input type="file" name="images[]" multiple>
        </p>
        <p>
            <label>Upload pdf Files: </label>
            <input type="file" name="files[]" multiple>
        </p>



            <input type="submit" value="Create">
        </form>
@endsection