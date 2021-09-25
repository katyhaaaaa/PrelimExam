@extends('index')

@section('form')

<div class="row">

    <div class="col-md-4 offset-md-4">

        <div class="card mt-3">

            <div class="card-header bg-primary text-white">
                <h3 class="card-tittle d-flex justify-content-center">Registration</h3>
            </div>

            <div class="card-body">

                <form action="{{ url('/register') }}" method="post">

                    {{ csrf_field() }}

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email"> E-mail</label>
                        <input type="email" name="email" id="email"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"  class="form-control">
                    </div>

                    <div class="d-md-flex justify-content-md-center">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>

                    <div class="align-self-end d-flex justify-content-center">
                        <p>I have an account?<a href="{{ url('/login') }}">Login</a></p>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
