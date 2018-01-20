@extends('layouts.app')
<link href="{{ asset('css/items.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="items">
    <table style="width:100%">
        <tr >
            <th>itemscode</th>
            <th>itemname</th>
            <th>image</th>
        </tr>

        @foreach ($items as $item)
            <tr>
                <td>{{ $item->itemcode }}</td>
                <td>{{ $item->name }}</td>
                <td style="with:100"><img src={{ $item->imgpath }} alt="items image">
                </td>
            </tr>
        @endforeach
    </table>
        
    </div>
</div>
@endsection
