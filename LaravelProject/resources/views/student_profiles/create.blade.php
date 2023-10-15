@extends('layouts.master')

@section('title')
    Student Profile
@endsection


@section('heading')
<h1>Student Profile</h1>
@endsection

@section('content')

    <form method="POST" action='{{url("/")}}'>
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
            <label>GPA:</label>
            <input type="text" name="gpa" value="{{old('gpa')}}">
        </p>
        <p>
            <label>Select roles: </label>
            <select name="role" multiple>
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
            </select>
        </p>

        <input type="submit" value="Save"> 
    </form>
@endsection