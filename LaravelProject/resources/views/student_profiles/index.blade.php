@extends('layouts.master')

@section('title')
    Student Profile List
@endsection

@section('heading')
    <h1>Student Profile List</h1>
@endsection
@section('content')
        <h3>
            @if ($profiles)
                @foreach($profiles as $profile)
                    <li><a href="{{url("student_profile/$profile->id")}}">{{$profile->User->name}}</a></li> &nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
            @else
                No user found
            @endif
        </h3>




@endsection