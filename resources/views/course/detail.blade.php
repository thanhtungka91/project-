<html lang="en">
    <head>
        <title> Course </title>
    </head>
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <body>
    @extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="course_all">
                <a href="{{ route('course.add') }}" type="button" class="btn btn-default">新規登録</a>
                <br>
                <br>
                <span>登録済み講座一覧</span>
                <br>

                @if($course)
                    <div class="course_infor">
                        <li>
                            <video width="300" height="300" controls preload="true">
                            <source src="{{"/uploads/".$course->video}}"  type="video/mp4" />
                            </video>
                        </li>
                        <li>
                            {{$course->course_name}}
                        </li>
                        <li>
                            {{$course->subject_name}}
                        </li>
                        <li>
                            {{$course->subject_overview}}
                        </li>
                    </div>
                @else
                    there an issue
                @endif
            </div>
        </div>
    @endsection
    </body>


</html>