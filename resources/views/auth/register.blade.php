@extends('layouts.app')

@section('script')
    <script>
        function handleData() {
            var form_data = new FormData(document.querySelector("form"));
            if (!form_data.has("specializations[]")) {
                document.getElementById("chk_option_error").style.visibility = "visible";
            } else {
                document.getElementById("chk_option_error").style.visibility = "hidden";
                return true;
            }

            return false;
        }

        function validateRegisterForm(e) {
            let errors = [];

            // firstname
            let firstname = document.getElementById('firstname');
            // console.log(firstname.value);
            if (firstname.value == "") {
                let check = document.getElementById('firstname_validate');
                check.style.display = "block";
                firstname.classList.add('is-invalid');
                errors.push('firstname');
                // console.log(errors);
            } else {
                let check = document.getElementById('firstname_validate');
                check.style.display = "none";
                firstname.classList.remove('is-invalid');
            }

            // lastname
            let lastname = document.getElementById('lastname');

            if (lastname.value == "") {
                let check = document.getElementById('lastname_validate');
                check.style.display = "block";
                lastname.classList.add('is-invalid');
                errors.push('lastname');
            } else {
                let check = document.getElementById('lastname_validate');
                check.style.display = "none";
                lastname.classList.remove('is-invalid');
            }

            // email
            let email = document.getElementById('email');
            if (email.value == "") {
                let check = document.getElementById('email_validate');
                check.style.display = "block";
                email.classList.add('is-invalid');
                errors.push('email');
            } else {
                let check = document.getElementById('email_validate');
                check.style.display = "none";
                email.classList.remove('is-invalid');
            }
            // password
            let password = document.getElementById('password');
            if (password.value == "") {
                let check = document.getElementById('password_validate');
                check.style.display = "block";
                password.classList.add('is-invalid');
                errors.push('password');
            } else {
                let check = document.getElementById('password_validate');
                check.style.display = "none";
                password.classList.remove('is-invalid');
            }
            // password_confirm
            let password_confirm = document.getElementById('password-confirm');
            if (password_confirm.value == "") {
                let check = document.getElementById('password_confirm_validate');
                check.style.display = "block";
                password_confirm.classList.add('is-invalid');
                errors.push('password_confirm');
            } else {
                let check = document.getElementById('password_confirm_validate');
                check.style.display = "none";
                password_confirm.classList.remove('is-invalid');
            }

            // address_confirm
            let address = document.getElementById('address');
            if (address.value == "") {
                let check = document.getElementById('address_validate');
                check.style.display = "block";
                address.classList.add('is-invalid');
                errors.push('address');
            } else {
                let check = document.getElementById('address_validate');
                check.style.display = "none";
                address.classList.remove('is-invalid');
            }

            if (errors.length > 0) {
                if (!handleData()) {
                    (document.querySelector('#specializations.form-control')).classList.add('is-invalid');
                }
                return false;
            } else {
                if (handleData()) {
                    // console.log(document.querySelector('#specializations.form-control'));
                    return true;
                } else {
                    return false;
                }
            }
        }
    </script>
@endsection

@section('content')
    <div class="container">
        {{-- @foreach ($errors->all() as $err)
            <div class="alert alert-danger" role="alert">
                <strong>{{ $err }}</strong>
            </div>
        @endforeach --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}"
                            onsubmit="return handleData(),validateRegisterForm(event)">
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
                                            <strong>Compila questo campo </strong>
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
                                            <strong>Compila questo campo </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- EMAIL --}}
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email">

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
                                            <strong>Compila questo campo </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD CONFIRM --}}
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                    <span id="password_confirm_validate" class="invalid-feedback" role="alert">
                                        <strong>Compila questo campo </strong>
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
                                            Please select at least one option.
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
                                            <strong>Compila questo campo </strong>
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
