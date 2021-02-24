@extends('layout.nav_bar')


@section('page_title')    
<h1>Welcome home! {{ session('username') }} </h1>
@endsection



@section('title')
Home | ABC.com
@endsection