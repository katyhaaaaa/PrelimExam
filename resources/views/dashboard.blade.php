@extends('index')

@section('form')
<div class="container" style="margin-top: 5%">

    <form action="{{ url('/logout') }}" method="get">

        {{ csrf_field() }}

        <button class="btn btn-success" style="margin-left: 90%" type="submit">Logout</button>

        <div class="row">

            <div class="col-md-4 col-offset-4" style="align-content: center">

                <h4 style="text-align: center">Welcome to my Dashboard</h4>
                
                <hr> “The Best way to predict your Future is to create it.”
                                    — ABRAHAM LINCOLN <hr>

            </div>

        </div>
    </form>

</div>
@endsection
