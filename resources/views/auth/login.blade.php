@extends('layouts_admin.empty')

@section('content')
    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}" >
        <a href="/" class="text-center db"><img src="{{asset('/images/logo.png')}}" style="width:60%; height: 75px" alt="Home"></a>
        @csrf
        <br>
        <h3 class="box-title m-b-20 text-center">@lang('auth.login.title')</h3>

        <div class="form-group m-t-40">
            <div class="col-xs-12">
                <input type="email" required autocomplete="email" autofocus
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="@lang('validation.attributes.email')">.
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="password" required autocomplete="current-password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password"
                       placeholder="@lang('validation.attributes.password')">

                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="d-flex no-block align-items-center">
                <div class="checkbox checkbox-primary p-t-0">
                    <input type="checkbox" name="remember" id="checkbox-signup" {{ old('remember') ? 'checked' : '' }}>
                    <label for="checkbox-signup">@lang('auth.login.remember_me')</label>
                </div>
                <div class="ml-auto">
                    @if (Route::has('password.request'))
                        <a class="text-muted" href="{{ route('password.request') }}" id="to-recover">
                            <i class="fa fa-lock m-r-5"></i>
                            @lang('auth.login.forgot_password_link')
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                    @lang('auth.login.button_text')
                </button>
            </div>
        </div>

    </form>



@endsection
