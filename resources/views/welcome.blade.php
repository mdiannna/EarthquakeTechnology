@extends('layout')

@section('title', 'Page Title')

@section('content')
    <div class="title m-b-md">
        Next home project

    </div>
    <p>
Smart home assistant, that has accelerometer, gas, temperature, CO2 and other sensors. It helps predict and improve efficiency of the house in the future.

Also, it is provides disaster relief and alarm solutions to keep people in the house safe.</p>
    
    <div>
        <a href="/get" class="btn btn-success">GET</a>
        <a href="/post/view" class="btn btn-primary">POST</a>
    </div>
@endsection('content')