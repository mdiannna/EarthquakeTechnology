@extends('layout')

@section('title', 'Page Title')

@section('content')
    <div class="title m-b-md">
        Next home project
    </div>
    <div>
        <a href="/get" class="btn btn-success">GET</a>
        <a href="/post/view" class="btn btn-primary">POST</a>
    </div>
@endsection('content')