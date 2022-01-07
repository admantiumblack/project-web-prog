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
                    <img src="https://bm5cdn.azureedge.net/asset/images/logo.png" alt="Binus University">
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Create Feedback Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Create Forms</a>
                        </li>
                        <div class="btn-group dropend mt-3">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                View Result
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Forms</button></li>
                                <li><button class="dropdown-item" type="button">Feedback Tickets</button></li>
                            </ul>
                        </div>
                        <div class="btn-group dropend mt-3">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Manage
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Lecturer</button></li>
                                <li><button class="dropdown-item" type="button">Courses</button></li>
                            </ul>
                        </div>
                </div>
            </div>
    </nav>
    <hr class="my-0" />
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
