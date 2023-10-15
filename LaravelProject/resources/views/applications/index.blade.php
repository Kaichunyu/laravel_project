@extends('layouts.master')

@section('title')
    Application List
@endsection

@section('content')
    <h1>Application List</h1>
        @foreach ($applications as $application)
            <p>
                <ul>
                    <b>{{$application->id}}.
                    Student Name : {{$application->users->name}}
                    Apply to : {{$application->projects->title}}
                    </b>
                </ul>
            </p>

            
        @endforeach





@endsection