@extends('index')

@section('form')
<div class="jumbotron">

    <nav class="nav" style="margin-top: 2%">
        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ url('/login') }}" style="margin-left: 70%" class="btn btn-primary nav-items">Login</a>
    </nav>

    <div style="margin-top: 2%" class="container">

        <h1 style="text-align: center">Profile</h1>
        {{ csrf_field() }}

    </div>

</div>
  @endsection
