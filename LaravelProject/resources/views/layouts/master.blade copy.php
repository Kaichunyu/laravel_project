<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="right-links">
            @auth <!--- user is logged in ---> 
                {{Auth::user()->name}} ({{$type = Auth::user()->user_type->name}})

                <form method="POST" action= "{{url('/logout')}}">
                    {{csrf_field()}}
                    <input type="submit" value="Logout"> 
                </form>
                <br>
            @else <!--- user is not logged in ---> 
                    <a href="{{ route('login') }}">Login</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{ route('register') }}">Register</a> &nbsp;&nbsp;&nbsp;&nbsp;

            @endauth
        </div>
        
        <div class="left-links">
            <a href="{{url("/")}}">Home</a> &nbsp;&nbsp;|&nbsp;&nbsp;
            
            <a href="{{url("project")}}">Project List</a> &nbsp;&nbsp;|&nbsp;&nbsp;

            <a href="{{url("application")}}">Application List</a> &nbsp;&nbsp;|&nbsp;&nbsp;
            @Auth
                @php
                    $id = Auth::user()->id
                @endphp
                @if ($type != 'Industry Partner')
                    <a href="{{url("student_profile")}}"> Profile List</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                @endif
            @endAuth



        </div>


        <br><br><br><hr>
    @yield('content')
    </body>
    <hr>
    
</html>
