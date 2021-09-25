<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRELIM EXAM</title>
</head>
<body>

    @if (session('Error'))

        <div class="alert alert-danger">
            <div class="container">
                {{ session('Error') }}
            </div>
        </div>

    @endif

    @if (session('Message'))

        <div class="alert alert-success">
            <div class="container">
                {{ session('Message') }}
            </div>
        </div>

    @endif

    @if (session('errors'))

        <div class="alert alert-danger">
            <div class="container">
                Please see the following errors
                <ul>
                    @foreach (session('errors')->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach
                </ul>
            </div>
        </div>

    @endif

    <div class="container">
        @yield('form')
    </div>

</body>
</html>
