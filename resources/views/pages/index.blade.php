@extends('layouts.app')

@section('pageStyles')
    <style type="text/css">

    </style>
@endsection

@section('content')


    <div class="container">


        <div class="jumbotron text-center">
            <h1>Welcome to LaraBlog</h1>
            <p>An ordinary blog site built with an extraordinary framework.</p>
            <p>
                <a class="btn btn-lg btn-primary" href="{{ route('login') }}">Login</a>
                <a class="btn btn-lg btn-success" href="{{ route('register') }}">Register</a>
            </p>
        </div>


    </div>
    <!-- /container -->


@endsection


@section('pageScripts')

@endsection


