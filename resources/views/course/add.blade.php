<html lang="en">
    <head>
        <title> Add New</title>
    </head>

    <body>
    @extends('layouts.app')
    @section('content')
        <div class="container">
            </nav>
            <div class = 'panel-body'>
                {{--use laravel form --}}
                {!! Form::model(null,['method' => 'post','route' => ['course.create']]) !!}
                    <td>
                        {!! Form::label('講座名　※必須') !!}
                        {!! Form::text('course_name', null, [ 'class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::label('開催日時') !!}
                        {!! Form::text('start_time', null, [ 'class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::label('カリキュラム名　※必須') !!}
                        {!! Form::text('subject_name', null, [ 'class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::label('カリキュラム概要') !!}
                        {!! Form::textarea('subject_overview', null, [ 'class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::label('講師名　※必須') !!}
                        {!! Form::text('instructor_name', null, [ 'class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::label('講師プロフィール') !!}
                        {!! Form::textarea('instructor_infor', null, [ 'class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::label('動画登録　※必須') !!}
                        {!! Form::file('video', null, [ 'class' => 'form-control']) !!}
                        ※ファイル形式：.MPEG4、.MOV、.MP4.WMV<br>
                        ※ファイルサイズ：○○以下<br>
                    </td>
                    <td>
                        {!! Form::label('サムネイル登録') !!}
                        {!! Form::file('thumbnail', null, [ 'class' => 'form-control']) !!}
                        ※ファイル形式：.JPEG、.PNG<br>
                        ※ファイルサイズ：○○MB以下、横●●pix*縦●●pix <br>
                    </td>
                    <td>
                        {!! Form::label('スライド資料登録') !!}
                        {!! Form::file('slide', null, [ 'class' => 'form-control']) !!}
                        ※ファイル形式：.PDF<br>
                        ※ファイルサイズ：○○MB以下 <br>
                    </td>
                    <td>
                        {!! Form::label('スライド資料登録') !!}
                        <br>
                        {!!Form::select('public', array(true => 'Public', false => 'Private'), 'Private')!!}
            </td>
    <div class="body">
        {!! Form::submit('Register!') !!}
            </div>

                {!! Form::close() !!}
            </div>
            @yield('content')
        </div>
    @endsection
    </body>


</html>