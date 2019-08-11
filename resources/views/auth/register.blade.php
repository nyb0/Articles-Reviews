@extends('tempale')

@section('content')
<div class="auth">
    <h1>REGISTER</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input name="is_registered" type="hidden" value="1">
            <div>
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="@error('name') @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="text" class="@error('email') @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="@error('password') @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit">
                {{ __('Register') }}
            </button>

        </form>
    </div>
@endsection
