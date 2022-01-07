<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <nav class="navbar navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions">
                <img src="https://bm5cdn.azureedge.net/asset/images/logo.png" alt="Binus University">
            </a>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <img src="https://bm5cdn.azureedge.net/asset/images/logo.png" alt="Binus University">
                </div>
                <div class="offcanvas-body">
                    <p>Try scrolling the rest of the page to see this option in action.</p>
                </div>
            </div>
        </div>
        {{-- <div class="container-fluid">
            <a class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasScrolling" data--bs-dismiss="offcanvas" aria-controls="offcanvasNavbar"><img
                    src="https://bm5cdn.azureedge.net/asset/images/logo.png" alt="Binus University">
            </a>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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
                    </ul>
                </div>
            </div>
        </div> --}}
    </nav>
    <div class="p-3">
        <h3>@yield('title')</h3>
    </div>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
