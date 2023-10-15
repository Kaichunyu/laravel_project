@extends('layouts.master')

@section('title')
    {{$user->name}}
@endsection

@section('heading')
        <h1>{{$user->name}}</h1>
@endsection

@section('content')
        <p><b>Email Address: {{$user->email}}</b></p>
        <p><b>Approved Status: {{$status = $user->approval_status}}</b></p>
        <p><b>Project List: </b></p>
        <ul><h3>
            <div class="bg-white mt-4 mb-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($projects)
                        @foreach($projects as $project)
                            @if ($project->user_id == $user->id)    
                            <li><a href="{{url("project/$project->id")}}">{{$project->title}}</a></li>
                            @endif
                        @endforeach
                    @else
                        No project at this moment
                    @endif
                    </h3></ul>

                </div>
            </div>

        <br><br><br>
        @Auth
            @php
                $type = Auth::user()->user_type->name;
            @endphp
            @if ($type == "Teacher")
                @if (($status == "No"))
                    <a href=' {{url("user/$user->id/edit")}}'>Approve this Industry Partner</a><br><br>
                @endif
            @endif
        @endAuth

@endsection

