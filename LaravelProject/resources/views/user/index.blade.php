@extends('layouts.master')

@section('title')
    HomePage
@endsection

@section('heading')
    <h1>Industry Partner List</h1>
@endsection
@section('content')
    @Auth
        @php
            $type = Auth::user()->user_type->name;
        @endphp
        @if ($type == "Teacher")
            <h3>
                @if ($users)
                    @foreach($users as $user)
                        <li><a href="{{url("user/$user->id")}}">{{$user->name}}</a> &nbsp;&nbsp;&nbsp;&nbsp;|
                        <label>Approval Status: {{$user->approval_status}}</label>&nbsp;&nbsp;&nbsp;&nbsp;|
                    @endforeach
                @else
                    No user found
                @endif
            </h3>

            {{ $users->links()}}
        @else
            <h3>
                @if ($users)
                    @foreach($users as $user)
                        <li><a href="{{url("user/$user->id")}}">{{$user->name}}</a></li>
                    @endforeach
                @else
                    No user found
                @endif
            </h3>

            {{ $users->links()}}
        @endif
    @else
        <h3>
            @if ($users)
                @foreach($users as $user)
                    <li><a href="{{url("user/$user->id")}}">{{$user->name}}</a></li>

                @endforeach
            @else
                No user found
            @endif
        </h3>

        {{ $users->links()}}
    @endAuth

    <hr>
    @Auth
        @if ($type == 'Industry Partner')
            <a href=' {{url("project/create")}}'>Create A New project</a>&nbsp;&nbsp;&nbsp;&nbsp;
        @endif
    @endAuth
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
@endsection

