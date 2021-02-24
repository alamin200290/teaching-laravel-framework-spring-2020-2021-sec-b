@extends('layout/main')


@section('title')
USER LIST :: ABC.com
@endsection


@section('page_title')
<h1>User list</h1>
@endsection



@section('nav_bar')
<a href="/home">Back</a> |
<a href="/logout">logout</a>
@endsection


@section('main_content')
    <table border="1">
        <tr>
            <td>ID</td>
            <td>USERNAME</td>
            <td>PASSWORD</td>
            <td>TYPE</td>
            <td>Action</td>
        </tr>

        @for($i=0; $i < count($list); $i++)
        <tr>
            <td>{{ $list[$i]['userId'] }}</td>
            <td>{{ $list[$i]['username'] }}</td>
            <td>{{ $list[$i]['password'] }}</td>
            <td>{{ $list[$i]['type'] }}</td>
            <td>
                <a href="{{ route('home.edit', [$list[$i]['userId']]) }}">Edit</a> |
                <a href="/home/delete/{{ $list[$i]['userId'] }}">Delete</a> |
                <a href="/home/details/{{ $list[$i]['userId'] }}">Details</a>
            </td>
        </tr>
        @endfor
    </table>
@endsection