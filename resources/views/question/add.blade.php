<html lang="en">
    <head>
        <title> New Question</title>
    </head>
    <script src="/js/jquery/dist/jquery.min.js"></script>
    <script src="/js/question.js"></script>
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
                        {!! Form::text('question', null, [ 'class' => 'form-control question']) !!}
                    </td>
                    <div class="answer_text" id="answer_text">
                        <td>
                            {!! Form::label('補足type1') !!}
                            {!! Form::textarea('answers_type1', null, [ 'class' => 'form-control']) !!}
                        </td>
                    </div>
                    <div class="answer_select" style="display:none" id="answer_select" >
                        <td>
                            {!! Form::label('補足type2') !!}
                            <br>
                            {!! Form::text('answers_type2[]', null, [ 'class' => 'add_answer']) !!}
                            <button type="button" id = "add_answer" class="btn btn-default">＋入力欄追加</button>
                        </td>
                    </div>

                    <div class="answer_map" style="display:none" id="answer_map" >
                        <td>
                            {!! Form::label('補足type3') !!}
                            {!! Form::textarea('answers_type3', null, [ 'class' => 'form-control','id' => "answers"]) !!}
                        </td>
                    </div>

                    <td>
                        <br>
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