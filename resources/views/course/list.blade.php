<html lang="en">
    <head>
        <title> List Tasks</title>
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
                @foreach($courses as $course)
                    <br>
                    <div class="course_detail">
                        <div class="thumbnail">
                            <a href="{{ route('course.detail',['id'=>$course->id] )}}">
                                <img border="0" alt="W3Schools" src="{{ '/uploads/' . $course->thumbnail  }}">
                            </a>
                            {{--{{ Html::image('uploads/' . $course->thumbnail ) }}--}}

                        </div>
                        <div class="course_infor">
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
                    </div>
                @endforeach

            </div>
        </div>
    @endsection
    </body>


</html>