@extends('layouts.master')

@section('title')
    Approve Industry Parnter
@endsection


@section('heading')
    <h1>Approve {{$user->name}}?</h1>
@endsection
@section('content')   
    <form method="POST" action='{{url("user/$user->id")}}'>
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <p>
            <label>User Name: {{$user->name}}</label>
            <input type="hidden" name="name" value="{{$user->name}}">
        </p> 
        <p>
            <label>User Type: {{$user->user_type->name}}</label>
            <input type="hidden" name="user_type_id" value="{{$user->user_type_id}}">
        </p> 
        <p>
            <label>Industry Partner Email Address: {{$user->email}}</label>
            <input type="hidden" name="email" value="{{$user->email}}">
        </p> 
            <input type="hidden" name="password" value="{{$user->password}}">
        <p>
            <label>Approve: </label>
            <select name="approval_status">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </p>
        <input type="submit" value="updated"> 
    </form>

 
@endsection