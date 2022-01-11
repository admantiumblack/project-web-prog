<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Peer Review</title>
    <link rel="icon" type="image/png" href="https://bm5cdn.azureedge.net/newdefault/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="position-absolute card top-50 start-50 translate-middle c-card-350">
        <div class="card-body p-4">
            <img src="https://bm5cdn.azureedge.net/asset/images/logo.png" alt="Binus University">
            <div class="mt-3">
                <h3>App Peer Review Login</h3>
            </div>
            {{-- {{ $errors }} --}}
            <form class="mt-4" action="{{ route('api.login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <span class="input-group-text c-addon-42"><i class="far fa-envelope"></i></span>
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        name="email" placeholder="Email" value="{{ old('email') }}" aria-label="Email" required
                        autofocus autocomplete="email">
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text c-addon-42"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        name="password" placeholder="Password" value="{{ old('password') }}" aria-label="Password"
                        required autocomplete="password">
                </div>
                @forelse ($errors->all() as $error)
                    <div class="text-danger mt-2"><i class="fas fa-times"></i> {{ ucfirst($error) }}</div>
                @empty
                @endforelse
                <button type="submit" class="btn btn-primary mt-3 w-100"><i class="fas fa-sign-in-alt"></i>
                    Login</button>
            </form>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
