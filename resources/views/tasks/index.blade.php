<html lang="en">
    <head>
        <title> List Tasks</title>
        start from the simple
    </head>

    <body>
    @extends('layouts.app')
    @section('content')
        <div class="container">
            {{--<nav class = "navbar navbar-default">--}}
                {{-- contain in here, he is experience guy --}}
            </nav>
            <div class = 'panel-body'>
                {{--use laravel form --}}
                {!! Form::model(null,['method' => 'post','route' => ['tasks.create']]) !!}

                    <td>
                        {!! Form::label('Task name') !!}
                        {!! Form::text('task_name', null, [ 'class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::label('Task Content') !!}
                        {!! Form::textarea('task_content', null, [ 'class' => 'form-control']) !!}
                    </td>
            <div class="body">
                {!! Form::submit('Create!') !!}
            </div>

                {!! Form::close() !!}
            </div>
            @yield('content')
        </div>
    @endsection
    </body>


</html>