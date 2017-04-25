<html lang="en">
    <head>
        <title> New Question</title>
    </head>
    <script src="/js/question.js"></script>
    <script src="/js/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#question_type').change(function(){
                if($(this).val() == 2){
                    $("#answer_text").hide();
                    $("#answer_select").show();
                }
            });
        });
    </script>
    <body>
    @extends('layouts.app')
    @section('content')
        <div class="container">
            <div class = 'panel-body'>
                {!! Form::model(null,['method' => 'post','route' => ['question.create']]) !!}
                    <td>
                        {!! Form::label('解答方式　※必須') !!}
                        <br>
                        {!!Form::select('question_type', array(1 => '○×回答方式', 2 => '選択してくださ',3=>'自由入力方式'), 'Private',[ 'class' => 'btn btn-default','id' => 'question_type'])!!}
                    </td>
                    <td>
                        <br>
                        {!! Form::label('問題文　※必須') !!}
                        {!! Form::text('question', null, [ 'class' => 'form-control']) !!}
                    </td>
                    <div class="answer_text" id="answer_text">
                        <td>
                            {!! Form::label('補足') !!}
                            {!! Form::textarea('answers', null, [ 'class' => 'form-control']) !!}
                        </td>
                    </div>
                    <div class="answer_select" style="display:none" id="answer_select" >
                        <td>
                            {!! Form::label('補足slect') !!}
                            {!! Form::textarea('answers', null, [ 'class' => 'form-control']) !!}
                        </td>
                    </div>

                    <td>
                        {!! Form::label('スライド資料登録') !!}
                        <br>
                        {!!Form::select('public', array(true => 'Public', false => 'Private'), 'Private',[ 'class' => 'btn btn-default'])!!}
                    </td>
                    <br>
                    {!! Form::submit('Register!',[ 'class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
            </div>
            @yield('content')
        </div>
    @endsection
    </body>


</html>