<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="https://bm5cdn.azureedge.net/newdefault/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <nav class="navbar navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions">
                <div class="row">
                    <div class="col">
                        <img src="https://bm5cdn.azureedge.net/asset/images/logo.png" alt="Binus University">
                    </div>
                    <div class="col p-3 mt-3">
                        <p>@yield('title')</p>
                    </div>
                </div>
            </a>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn btn-outline-none" data-bs-dismiss="offcanvas" aria-label="Close">
                        <img src="https://bm5cdn.azureedge.net/asset/images/logo.png" alt="Binus University">
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1 pe-3">
                        @if (Cookie::get('user_auth') !== null)
                            
                        <li class="nav-item mx-auto">
                            {{-- Semua --}}
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        @if (strcmp(explode('_', Cookie::get('user_auth'))[1], 'SCC'))
                        <li class="nav-item mx-auto">
                            {{-- SCC --}}
                            <a class="nav-link active" aria-current="page" href="{{ route('viewAllForm') }}">View All Form</a>
                        </li>
                        <li class="nav-item mx-auto">
                            {{-- SCC --}}
                            <a class="nav-link active" aria-current="page" href="{{ route('viewAllFeed') }}">View All Feedback Ticket</a>
                        </li>
                        @endif

                            @if (strcmp(explode('_', Cookie::get('user_auth'))[1], 'Dean'))
                            <li class="nav-item mx-auto">
                                {{-- Kajur / Admin --}}
                                <a class="nav-link active" aria-current="page" href="#">Manage Lecturers</a>
                            </li>
                            <li class="nav-item mx-auto">
                                {{-- Kajur / Admin --}}
                                <a class="nav-link active" aria-current="page" href="#">Manage Courses</a>
                            </li>
                            @endif
                        <li class="nav-item mt-1 mx-auto">
                            {{-- Semua --}}
                            <a class="nav-link active" aria-current="page" href="{{ route('api.logout') }}">Logout</a>
                        </li>
                        @endif
                    </div>
                </div>
    </nav>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
