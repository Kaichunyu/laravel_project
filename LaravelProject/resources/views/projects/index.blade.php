@extends('layouts.master')

@section('title')
    Project List
@endsection

@section('heading')
<h1>Project List</h1>
@endsection

@section('content')

        @foreach ($years_trimesters as $year_trimester)
            <p>
                <h4>{{$year = $year_trimester->offering_year }} Trimester {{$trimester = $year_trimester->offering_trimester}}</h4>
                @php
                    $projects_within_period = $projects->where('offering_year', $year)->where('offering_trimester', $trimester);
                @endphp

                @foreach ($projects_within_period as $project)
                    <li><a href="{{url("project/$project->id")}}">{{$project->title}}</a></li>
                @endforeach
            </p>

            
        @endforeach





@endsection