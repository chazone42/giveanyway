@extends('layouts.app')

<style>
    .enroll-left{
        float: left;
        background-color: #f26d7d;
        padding: 80px 50px 0 80px;
        width: 35%;

    }
    .enroll-r{
        float: right;
        background-color: white;
        width: 65%;
    }
    .enroll-left h4{
        font-family: 'Mitr', sans-serif;
        color: white;
    }
    .enroll-left a{
        font-family: 'Mitr', sans-serif;
        color: white;
    }
    @media (max-width: 575.98px){
        .enroll-left{
            width: 100%;
        }
        .enroll-r{
            width: 100%;
            margin-left: 10%;
        }
    }
</style>

@section('content')

    <div class="row">
        <div class="enroll-left">
            <h4>ลงชื่อเข้าใช้งาน</h4>
            <a class="nav-link" href="{{ route('login') }}">{{ __('ฉันยังไม่มีบัญชี') }}</a>
        </div>
        <div class="enroll-r pt-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row col-sm-12">
                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('อีเมล') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row col-sm-12">
                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row col-sm-10">
                    <div class="col-md-6 offset-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0 col-sm-10">
                    <div class="col-md-8 offset-md-5">
                        <button type="submit" class="btn btn-primary">
                            {{ __('ลงชื่อเข้าใช้') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('ลืมรหัสผ่าน?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
