@extends('layouts.app')

@section('script')
    <script>
        function handleData() {
            var form_data = new FormData(document.querySelector("form"));
            const div = document.getElementById('specializations')

            if (!form_data.has("specializations[]")) {
                document.getElementById("chk_option_error").style.visibility = "visible";
            } else {
                div.classList.remove('is-invalid')
                document.getElementById("chk_option_error").style.visibility = "hidden";
                return true;
            }
            div.classList.add('is-invalid')

            return false;
        }

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


    function validateRegisterForm(e) {
        const checkSub = {
            firstname: false,
            lastname: false,
            email: false,
            password: false,
            address: false,
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

            handleData();
            if (!Object.values(checkSub).includes(false)) {
                return handleData();
            }
            return false;
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}"
                            onsubmit="return validateRegisterForm(event)">
                            @csrf


                            {{-- FIRSTNAME --}}
                            <div class="form-group row">
                                <label for="firstname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text"
                                        class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                        value="{{ old('firstname') }}" autocomplete="firstname" autofocus>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span id="firstname_validate" class="invalid-feedback" role="alert">

                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- LASTNAME --}}
                            <div class="form-group row">
                                <label for="lastname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span id="lastname_validate" class="invalid-feedback" role="alert">

                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- EMAIL --}}
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span id="email_validate" class="invalid-feedback" role="alert">

                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span id="password_validate" class="invalid-feedback" role="alert">

                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD CONFIRM --}}
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                    <span id="password_confirm_validate" class="invalid-feedback" role="alert">

                                    </span>
                                </div>
                            </div>

                            {{-- SPECIALIZATIONS --}}

                            <div class="form-group row">
                                <label for="specializations"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Specializations') }}</label>

                                <div class="col-md-6">
                                    <div id="specializations" class="form-control">
                                        {{-- <div id="specializations"
                                        class="form-control @error('specializations') is-invalid @enderror"> --}}
                                        @foreach ($spec as $spec_value)
                                            {{-- @dd($spec_value) --}}
                                            <div>
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $spec_value->id }}" name="specializations[]"
                                                    @if (in_array($spec_value->id, old('specializations', []))) checked @endif>

                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $spec_value->category }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div style="visibility:hidden; color:red; " id="chk_option_error">
                                            <strong>Campo obbligatorio!</strong>
                                        </div>
                                        @error('specializations')
                                            {{-- @dd($errors->any())
                                            @dd($message) --}}
                                            <span class="invalid-feedback" id="InvalidCheck3Feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            {{-- ADDRESS --}}
                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @else
                                        <span id="address_validate" class="invalid-feedback" role="alert">

                                        </span>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    {{-- SUBMIT --}}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="submit" type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    {{-- @dd($errors) --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
