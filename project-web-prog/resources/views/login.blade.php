@extends('layout.master')

@section('title', 'App Peer Review')

@section('content')
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
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                        placeholder="Email" value="{{ old('email') }}" aria-label="Email" required autofocus
                        autocomplete="email">
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

@endsection
