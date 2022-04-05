@extends('layouts.app')

@section('script')
    <script>
        function setError(div, el_error, msg) {
            // console.log(div, el_error, msg);
            div.classList.add('is-invalid');
            el_error.style.display = 'block'
            el_error.innerHTML = `<strong>${msg}</strong>`;
        }

        function removeError(div, el_error) {
            div.classList.remove('is-invalid');
            el_error.style.display = 'none';

        }

        function defaultError(div, el_error, msg) {
            if (div.value === '') {
                div.classList.add('is-invalid');
                setError(div, el_error, msg);
                return false
            } else {
                el_error.style.display = 'none';
                return true;
            }

        }

        function isMailValue(val) {
            if (val.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
            return true;
        } else {
            return false;
        }
    }

    function validateLoginForm(e) {
        const checkSub = {
            email: false,
            password: false,
        };

        for (const key in checkSub) {
            const el = checkSub[key];

            const div = document.getElementById(key);
            const el_error = document.getElementById(`${key}_validate`);

                let res = defaultError(div, el_error, 'Campo obbligatorio!');

                if (res) {
                    checkSub[key] = true;
                    removeError(div, el_error);
                    if (key === 'password') {
                        if (div.value.length < 8) {
                            setError(div, el_error, 'La password deve contenere almeno 8 caratteri');
                            // checkSub[index] = false;
                            checkSub[key] = false
                        } else {
                            removeError(div, el_error);
                            // checkSub[index] = true;
                            checkSub[key] = true
                        }
                    }
                    if (key === 'email') {
                        if (!isMailValue(div.value)) {
                            setError(div, el_error, 'Inserire un indirizzo email valido');
                            checkSub[key] = false
                            // checkSub[index] = false
                        } else {
                            removeError(div, el_error);
                            checkSub[key] = true
                            // checkSub[index] = true;
                        }
                    }
                } else {
                    checkSub[key] = false;
                }
            }

            if (!Object.values(checkSub).includes(false)) {
                return true;
            }
            return false;
            //     // e.preventDefault();
            //     // console.log('ciao');
            //     let errors = [];


            //     let email = document.getElementById('email');
            //     let checkMail = document.getElementById('email_validate');
            //     if (email.value == "") {
            //         // let check = document.getElementById('email_validate');
            //         if (checkMail) {
            //             checkMail.style.display = "block";
            //             email.classList.add('is-invalid');
            //             errors.push('email');
            //         }
            //     } else {
            //         checkMail.style.display = "none";
            //         email.classList.remove('is-invalid');
            //     }


            //     let password = document.getElementById('password');
            //     let checkPsw = document.getElementById('password_validate');
            //     if (password.value == "") {
            //         checkPsw.style.display = "block";
            //         password.classList.add('is-invalid');
            //         errors.push('password');
            //     } else {
            //         // let checkPsw = document.getElementById('password_validate');
            //         checkPsw.style.display = "none";
            //         password.classList.remove('is-invalid');
            //     }

            //     if (errors.length > 0) {
            //         return false;
            //     } else {

            //         return true;
            //     }
        }
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" onsubmit="return validateLoginForm(event)">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span id="email_validate" class="invalid-feedback" role="alert">
                                            <strong>Compila questo campo </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span id="password_validate" class="invalid-feedback" role="alert">
                                            <strong>Compila questo campo </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
