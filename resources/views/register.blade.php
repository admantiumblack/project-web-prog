@extends('layout.guest')

@section('content')

    <div class="mt-3">
        <h3>App Peer Review Register</h3>
    </div>
    {{-- {{ $errors }} --}}
    {{-- <form class="mt-4" action="{{ route('api.register') }}" method="POST"> --}}
    <form class="mt-4" action="" method="POST">
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
        <div class="input-group mt-3">
            <span class="input-group-text c-addon-42"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}"
                name="confirm_password" placeholder="Confirm Password" value="{{ old('confirm_password') }}" aria-label="Confirm Password"
                required autocomplete="confirm_password">
        </div>
        <div class="input-group mt-3">
            <span class="input-group-text c-addon-42"><i class="fas fa-lock"></i></span>
            <input type="text" class="form-control {{ $errors->has('lecturer_id') ? 'is-invalid' : '' }}"
                name="lecturer_id" placeholder="Lecturer ID" value="{{ old('lecturer_id') }}" aria-label="Lecturer ID"
                required autocomplete="lecturer_id">
        </div>
        <div class="input-group mt-3">
            <span class="input-group-text c-addon-42"><i class="fas fa-lock"></i></span>
            <input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                name="phone_number" placeholder="Phone number" value="{{ old('phone_number') }}" aria-label="Phone number"
                required autocomplete="phone_number">
        </div>
        @forelse ($errors->all() as $error)
            <div class="text-danger mt-2"><i class="fas fa-times"></i> {{ ucfirst($error) }}</div>
        @empty
        @endforelse
        <button type="submit" class="btn btn-primary mt-3 w-100"><i class="fas fa-sign-in-alt"></i>
            Register</button>
    </form>

@endsection