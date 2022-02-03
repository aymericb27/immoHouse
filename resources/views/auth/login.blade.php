<div class="modal loginModal @if(!$errors->has('email') && !$errors->has('password'))d-none @endif">
    <div class="modal_content">
        <div class="modal_header mb-30"> <span class="close">&times;</span></div>
        <div class="modal_body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row mb-10">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-10">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="text-center col-md-12">
                        <div class="row col-md-8 m-auto">
                            <button type="submit" class="btn btn-primary col-md-12 mb-10">
                                {{ __('Login') }}
                            </button>
                            <div class="col-md-6 pl-0 text-left mb-40">
                                <a class="btn-link" href="{{ url('/register') }}">{{__('register')}}</a>
                            </div>
                                <div class="col-md-6 pr-0 text-right mb-40">
                                    @if (Route::has('password.request'))
                                        <a class="btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <a  class="btn col-md-12 mb-10 googleBtn" href="{{url('/sign-in/google')}}"><img src="{!! url('img/google_logo.png') !!}">{{__('sign in with google')}}</a>

                            <a class="btn col-md-12 mb-10 facebookBtn" href="{{url('/sign-in/facebook')}}"><img src="{!! url('img/facebook_logo.png') !!}">{{__('sign in with facebook')}}</a>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
