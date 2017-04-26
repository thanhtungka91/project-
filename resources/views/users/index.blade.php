<html lang="en">
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
                           <button type="button" class="btn btn-default">Edit</button>
                       </td>
                       <td>
                           <button type="button" class="btn btn-danger">Delete</button>
                       </td>
                   </tr>
               @endforeach
            </table>
                <button type="button" class="btn btn-default">Create New</button>
        </div>
    @endsection
    </body>


</html>