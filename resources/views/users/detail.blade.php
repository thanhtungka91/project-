@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Information</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        @if($user)
                            <tr>
                                <td>
                                    {{$user->id}}
                                </td><td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    @if($user->active == 1)
                                        Acitved
                                    @else
                                        No Active
                                    @endif
                                </td>
                            </tr>

                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
