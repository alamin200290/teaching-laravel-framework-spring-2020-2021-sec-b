@extends('main')


@section('nav_bar')
<a href="/home/create">Create user</a> |
<a href="{{route('home.userlist')}}">View user list</a> |
<a href="/logout">logout</a>
@endsection
