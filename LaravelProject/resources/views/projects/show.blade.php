@extends('layouts.master')

@section('title')
  {{$project->title}}
@endsection

@section('heading')
<h1>{{$project->title}}</h1>
@endsection


@section('content')
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

    @foreach ($images as $image)
        <img src="{{url($image)}}" alt="project image" style="width:300px;height:300px;">
    @endforeach
    <p><b>Industry Partner: {{$project->users->name}}</b></p>
    <p><b>Project ID: {{$project->id}}</b></p>
    <p><b>Project Description: {{$project->description}}</b></p>
    <p><b>Number of student needed: {{$project->number_of_student_needed}}</b></p>
    <p><b>Offering Trimester: {{$project->offering_trimester}}</b></p>
    <p><b>Offering Year: {{$project->offering_year}}</b></p>
    <p><b>Approval Status: {{$project->approval_status}}</b></p>

    <p>For More Information: </p>
        @foreach ($files as $file)
        <p><a href=' {{url("$file")}}'> {{url("$file")}}</a></p>
        @endforeach


    <br><br>

    @Auth
        @php
            $type = Auth::user()->user_type->name;
            $login_name = Auth::user()->name;
            $name = $project->users->name;
        @endphp
        @if ($type == 'Industry Partner')
            @if ($login_name == $name)

                <a href=' {{url("project/$project->id/edit")}}'>Updated</a><br><br>

                <form method="POST" action = '{{url("project/$project->id")}}'>
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete">
                </form>
            @endif
        @elseif ($type == 'Student')
            <a href="{{ url("application/create") }}" value="{{$project->id}}">Apply</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="hidden" name="project_id" value="{{$project->id}}">



        @endif
    @endauth



    <br><br><br><br>

    <p>
        <div class="table">
            <table>
                <caption>Pending Application</caption> 
                <tr>
                    <th>Student Name</th>
                    <th>Justification</th>

                </tr>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{$application->users->name}}</td>
                        <td>{{$application->justification}}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </p>


@endsection