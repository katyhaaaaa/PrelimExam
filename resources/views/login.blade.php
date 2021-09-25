@extends('index')

@section('form')

<div class="row">

    <a class="nav-link" href="{{ url('/') }}">Back</a>

    <div class="col-md-4 offset-md-4">

        <div class="card mt-3">

            <div class="card-header bg-primary text-white">
                <h3 class="card-tittle d-flex justify-content-center">LogIn</h3>
            </div>

            <div class="card-body">

                <form action="{{ url('/login') }}" method="post">

                    {{ csrf_field() }}

                    <div class="mb-3">
                        <label for="email"> E-mail</label>
                        <input type="email" name="email" id="email"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"  class="form-control">
                    </div>

                    <div class="d-md-flex justify-content-md-center">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>

                    <div class="align-self-end">
                        <p class="d-flex justify-content-center">I Don't have an Account?<a href="{{ url('/register') }}">Register</a></p>
                    </div>


                </form>

            </div>

        </div>

    </div>

</div>

@endsection
