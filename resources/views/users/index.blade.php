<html lang="en">
<link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <head>
        <title>User Management</title>
    </head>
    @extends('layouts.app')
    @section('content')
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                </thead>
               @foreach($users as $user)
                   <tr>
                       <td>
                           {{$user->name}}
                       </td>
                       <td>
                           {{$user->email}}
                       </td>
                       <td>
                           @if($user->active==1)
                               Actived
                           @else
                               No Actived yet
                           @endif
                       </td>
                       <td>
                           <a href="{{ route('user.detail',['id' =>$user->id ]) }}" type="button" class="btn btn-default">Detail</a>
                       </td>
                       <td>
                           {!! Form::open(['route' => ['user.delete', $user->id]]) !!}
                           <input name="_method" type="hidden" value="DELETE">
                           <button type="submit" class="btn btn-default btn-danger" value="Delete"></button>
                           {!! Form::close() !!}
                       </td>
                   </tr>
               @endforeach
            </table>
                <a href="{{ route('user.add') }}" type="button" class="btn btn-default">Create New</a>
        </div>
    @endsection
    </body>


</html>