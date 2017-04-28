<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fileupload.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class = 'panel-body'>
        {{--use laravel form --}}
        {!! Form::model(null,['method' => 'post','route' => ['course.create'],'id'=>'mainForm']) !!}
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
            <div>
                <input type = hidden class="form-control" name="thumbnail" id="thumbnail">
                <input type = hidden class="form-control" name="video" id="video">
                <input type = hidden class="form-control" name="document" id="document">
            </div>
        </td>
        <td>
            <span class="btn btn-success fileinput-button fileinput-video-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Upload Video</span>
            <input id="uploadvideo" type="file" name="files" >
            </span>
            <br>
            <br>
            <div id="progress" class="progress" style="display: none" >
                <div class="progress-bar progress-bar-success"></div>
            </div>
            <div id="files" class="files"></div>
            <br>
        </td>
        <td>
            <span class="btn btn-success fileinput-button fileinput-thumbnail-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Upload Thumbnail</span>
            <input id="uploadthumbnail" type="file" name="files" >

            </span>
            <br>
            <br>
            <div id="progress" class="progress" style="display: none">
                <div class="progress-bar progress-bar-success" ></div>
            </div>
            <div id="video_files" class="video_files"></div>
            <br>
        </td>
        <td>
            <span class="btn btn-success fileinput-button fileinput-document-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Upload Document</span>
            <input id="uploaddocument" type="file" name="files[]" multiple>

            </span>
            <br>
            <br>
            <div id="progress" class="progress" style="display: none">
                <div class="progress-bar progress-bar-success"></div>
            </div>
            <div id="documnet_files" class="documnet_files"></div>
            <br>
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

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/jquery.ui.widget.js"></script>
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="/js/jquery.iframe-transport.js"></script>
<script src="/js/jquery.fileupload.js"></script>
<script src="/js/jquery.fileupload-process.js"></script>
<script src="/js/jquery.fileupload-image.js"></script>
<script src="/js/jquery.fileupload-audio.js"></script>
<script src="/js/jquery.fileupload-video.js"></script>
<script src="/js/jquery.fileupload-validate.js"></script>
<script src="/js/add_course.js"></script>
</body>
</html>
