@extends('layouts.admin')

@section('title')
    edit
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script>
        function handleData() {
            var form_data = new FormData(document.querySelector("form"));
            const div = document.getElementById('specializations_validate')
            if (!form_data.has("specializations[]")) {
                document.getElementById("chk_option_error").style.visibility = "visible";
            } else {
                document.getElementById("chk_option_error").style.visibility = "hidden";
                return true
            }
            div.classList.add('is-invalid')

            return false;
        }

        function validateEditForm(e) {
            // console.log(e.target.value);
            e.preventDefault();
            let errors = [];

            // firstname
            let firstname = document.getElementById('firstname');
            // console.log(firstname.value);
            let check = document.getElementById('firstname_validate');
            if (firstname.value == "") {
                // let check = document.getElementById('firstname_validate');
                // check.style.display = "block";
                // console.log(firstname.classList);
                firstname.classList.add('is-invalid');
                errors.push('firstname');
                check.style.display = "block"
            } else {
                check.style.display = "none";
                firstname.classList.remove('is-invalid');
            }

            // lastname
            let lastname = document.getElementById('lastname');

            check = document.getElementById('lastname_validate');
            if (lastname.value == "") {
                // let check = document.getElementById('lastname_validate');
                // check.style.display = "block";
                lastname.classList.add('is-invalid');
                errors.push('lastname');
                check.style.display = "block"
            } else {
                check.style.display = "none";
                lastname.classList.remove('is-invalid');
            }

            // email
            let email = document.getElementById('email');
            check = document.getElementById('email_validate');
            if (email.value == "") {
                // let check = document.getElementById('email_validate');
                // check.style.display = "block";
                email.classList.add('is-invalid');
                check.style.display = "block"
            } else {
                // ===========new

                if (!email.value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
                email.classList.add('is-invalid');
                check.innerHTML = `<strong>Inserisci un indirizzo email valido</strong>`
                    check.style.display = "block"
                    errors.push('email');
                    // return true;
                } else {
                    // return false;
                    check.style.display = "none";
                    email.classList.remove('is-invalid');
                }

                // --------------first
                // check.style.display = "none";
                // email.classList.remove('is-invalid');
            }

            // address_confirm
            let address = document.getElementById('address');
            check = document.getElementById('address_validate');
            if (address.value == "") {
                // let check = document.getElementById('address_validate');
                // check.style.display = "block";
                address.classList.add('is-invalid');
                errors.push('address');
                check.style.display = "block"
            } else {
                check.style.display = "none";
                address.classList.remove('is-invalid');
            }



            handleData();
            if (errors.length > 0) {
                // console.log(true);
                // e.currentTarget.submit();
                return false;
            }
            //  else {
            //     if (handleData()) {
            //         // console.log('handle');
            //         // e.submit();
            //         return true;
            //         // document.getElementById('submit').submit();
            //     } else {
            //         // console.log('non handle');
            //         return false;
            //     }
            //     // console.log(false);
            //     // return true
            // }
            else {


                e.currentTarget.submit();
                return handleData()
            }

            // console.log(errors.length);
            // if (errors.length > 0) {
            //     return false;
            // } else {
            //     return true;
            // }
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row edit-title">
            <div class="col-12 welcome-nobg justify-content-start d-flex align-items-center text-white">
                <h4 class="text-uppercase mb-0 py-2">Modifica il tuo profilo</h4>
            </div>
        </div>
        <div class="row justify-item-center w-row-name pt-2 radious-row">
            <div class="col-12">
                {{-- @if (session('edit_response'))
                    <div class="alert alert-success" role="alert">
                        {{ session('edit_response') }}
                    </div>
                @endif --}}
                {{-- Modifica possibile solo a se stessi o se si é admin --}}
                <div class="col">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return validateEditForm(event)">
                        @csrf
                        @method('PATCH')
                </div>
                <!-- NOME -->
                <div class="mb-3">
                    <label for="firstname" class="form-label fs-4">Nome</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                        value="{{ old('firstname', $doctor->firstname) }}">
                    @error('firstname')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <span id="firstname_validate" class="invalid-feedback" role="alert">
                        <strong>Compila questo campo </strong>
                    </span>
                </div>
            </div>
            <div class="col-12">

                <!-- COGNOME -->
                <div class="mb-3">
                    <label for="lastname" class="form-label fs-4">Cognome</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                        value="{{ old('lastname', $doctor->lastname) }}">
                    @error('lastname')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <span id="lastname_validate" class="invalid-feedback" role="alert">
                        <strong>Compila questo campo </strong>
                    </span>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="form-check d-flex justify-content-around align-items-center mt-3 mb-3">

                                {{-- @foreach ($specializations as $specialization)
                                    <li class="item-spec">
                                        <input class="form-check-input" type="checkbox" value="{{ $specialization->id }}"
                                            name="specializations[]"
                                            {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $specialization->category }}
                                        </label>
                                    </li>
                                @endforeach --}}

                            </div>
                            @error('specializations')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        @else
                            {{-- Altrimenti prendiamo i dati dal db e checchiamo i nostri checkbox corrispondenti --}}
                            <div id="specializations_validate"
                                class="form-control d-flex justify-content-around align-items-center mt-3 mb-3 m-1200-check">

                                <div class="d-flex flex-wrap justify-content-around">
                                    @foreach ($specializations as $specialization)
                                        <label class="list-inline-item me-4">
                                            <input class="form-check-input" type="checkbox"
                                                value="{{ $specialization->id }}" name="specializations[]"
                                                {{ $doctor->specializations()->get()->contains($specialization->id)? 'checked': '' }}>
                                            {{ $specialization->category }}
                                        </label>
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

                                {{-- <ul>
                                    @foreach ($specializations as $specialization)
                                    <li class="item-spec">
                                            <input class="form-check-input" type="checkbox" value="{{ $specialization->id }}"
                                                name="specializations[]"
                                                {{ $doctor->specializations()->get()->contains($specialization->id)? 'checked': '' }}>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $specialization->category }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul> --}}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- EMAIL --}}
                <div class="row">
                    <div class="col-12">
                        <input type="password" class="d-none" name="" id="">

                        <div class="mb-3">
                            <label for="email" class="form-label fs-4">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email', $doctor->email) }}">
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span id="email_validate" class="invalid-feedback" role="alert">
                                <strong>Compila questo campo </strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row m-1200-pass">
                    <div class="col-6">
                        {{-- CURRENT PASSWORD --}}
                        <div class="mb-3">
                            <label for="old-password" class="form-label text-md-right fs-4">Vecchia Password</label>

                            <input id="old-password" type="password" class="form-control" name="old-password">

                            @error('old-password')
                                {{-- <span class="invalid-feedback" role="alert"> --}}
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                    {{-- </span> --}}
                                </div>
                            @enderror
                            {{-- <span id="password_confirm_validate" class="invalid-feedback" role="alert">
                                <strong>Compila questo campo </strong>
                            </span> --}}
                        </div>
                    </div>
                    {{-- NEW PASSWORD --}}
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="password" class="form-label text-md-right fs-4">Nuova Password</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                {{-- <span class="invalid-feedback" role="alert"> --}}
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                    {{-- </span> --}}
                                </div>
                            @enderror
                            {{-- <span id="password_validate" class="invalid-feedback" role="alert">
                                    <strong>Compila questo campo </strong>
                                </span> --}}
                        </div>
                    </div>
                    <div class="col-3">
                        {{-- NEW PASSWORD CONFIRM --}}
                        <div class="mb-3">
                            <label for="password-confirm" class="col-form-label text-md-right pt-0 fs-4">Conferma
                                Password</label>

                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="address" class="form-label fs-4">Indirizzo</label>
                            <input type="address" class="form-control" id="address" name="address"
                                value="{{ old('address', $doctor->address) }}">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span id="address_validate" class="invalid-feedback" role="alert">
                                <strong>Compila questo campo </strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="photo" class="form-label fs-4">Inserisci la tua foto</label>
                            <input type="file" name="photo" value="">
                            @error('photo')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="cv" class="form-label fs-4">Inserisci il tuo cv</label>
                            <input type="file" name="cv" value="">
                            @error('cv')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if ($doctor->cv)
                            <embed src="http://localhost:8000/storage/{{ $doctor->cv }}" width="200px" height="200px" />
                        @else
                            <b class="text-danger"><em>Non hai ancora caricato il tuo CV. Inseriscilo al piu
                                    presto!</em></b>
                        @endif

                        {{-- <img src="http://localhost:8000/storage/{{ $doctor->cv }}"
                        alt="Curriculum Vitae non caricato correttamente"> --}}
                    </div>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-6">
                    <input class="btn btn-primary" type="submit" value="Salva">
                    </form>
                </div>
                <div class="col-6">
                    <form action="{{ route('profile.destroy', $doctor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip"
                            title='Delete'>Delete</button>
                    </form>
                </div>
            </div>
        @endsection
