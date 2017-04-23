<html lang="en">
    <head>
        <title> List Tasks</title>
        start from the simple
    </head>

    <body>
    @extends('layouts.app')
    @section('content')
        <div class="container">
            <nav class = "navbar navbar-default">
                {{-- contain in here, he is experience guy --}}
            </nav>
            <div class = 'panel-body'>
                {{--@include('common.erros')--}}
                {{--new emplate like extend??--}}
                <form action = '/task' method="POST" class="form-horizontal">
                    {{csrf_field()}}
                    <!-- Taks Name, seems to be good to start from the begin -->
                    <div class="form-group">
                        <label for="tasks" class="col-sm-3 control-label">
                            Tasks
                        </label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            @yield('content')
        </div>
    @endsection
    </body>


</html>