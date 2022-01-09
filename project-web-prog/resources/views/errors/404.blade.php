<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404</title>
    <link rel="icon" type="image/png" href="https://bm5cdn.azureedge.net/newdefault/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="container-xl bg-white border border-dark mt-4 p-3 text-center">
        {{-- <div class="border border-dark m-3 p-3"> --}}
            <h1 class="text-danger mb-3">Error 404</h1>
            <h5 class="mb-2 p-3">The resource you are looking for might have been removed, had its name changed, or is temporarily
                unavailable.</h5>
            <a href="{{ route('login') }}" class="btn btn-primary">Return to App Peer Review</a>
        {{-- </div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
