@extends('tempale')

@section('content')

    <div class="auth">
        <h1>LOGIN</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="@error('email') @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="@error('password') @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <button type="submit">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="forgot" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

        </form>
    </div>
@endsection
