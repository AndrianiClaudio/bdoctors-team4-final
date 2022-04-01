@extends('layouts.admin')

@section('title')
    edit
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script>
        // function handleData() {
        //     var form_data = new FormData(document.querySelector("form"));
        //     if (!form_data.has("specializations[]")) {
        //         document.getElementById("chk_option_error").style.visibility = "visible";
        //     } else {
        //         document.getElementById("chk_option_error").style.visibility = "hidden";
        //         return true
        //     }

        //     return false;
        // }

        function validateEditForm(e) {
            // console.log(e.target.value);
            e.preventDefault();
            let errors = [];

            // firstname
            let firstname = document.getElementById('firstname');
            // console.log(firstname.value);
            if (firstname.value == "") {
                // let check = document.getElementById('firstname_validate');
                // check.style.display = "block";
                firstname.classList.add('is-invalid');
                errors.push('firstname');
            } else {
                let check = document.getElementById('firstname_validate');
                check.style.display = "none";
                firstname.classList.remove('is-invalid');
            }

            // lastname
            let lastname = document.getElementById('lastname');

            if (lastname.value == "") {
                // let check = document.getElementById('lastname_validate');
                // check.style.display = "block";
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
                // let check = document.getElementById('email_validate');
                // check.style.display = "block";
                email.classList.add('is-invalid');
                errors.push('email');
            } else {
                let check = document.getElementById('email_validate');
                check.style.display = "none";
                email.classList.remove('is-invalid');
            }

            // address_confirm
            let address = document.getElementById('address');
            if (address.value == "") {
                // let check = document.getElementById('address_validate');
                // check.style.display = "block";
                address.classList.add('is-invalid');
                errors.push('address');
            } else {
                let check = document.getElementById('address_validate');
                check.style.display = "none";
                address.classList.remove('is-invalid');
            }



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
                return true
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
        <div class="row">
            <div class="col-12">
                <h1>Modify Doctor</h1>
            </div>

            @if (session('edit_response'))
                <div class="alert alert-success" role="alert">
                    {{ session('edit_response') }}
                </div>
            @endif
            {{-- Modifica possibile solo a se stessi o se si é admin --}}
            @if ($doctor->id === Auth::id())
                <div class="col">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return validateEditForm(event)">
                        @csrf
                        @method('PATCH')

                        {{-- firstname --}}
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Nome</label>
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

                        {{-- lastname --}}
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Cognome</label>
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
                        {{-- specialization --}}

                        {{-- EDIT UPLOAD --}}
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" value="">
                            @error('photo')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        @if ($errors->any())
                            @foreach ($specializations as $specialization)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $specialization->id }}"
                                        name="specializations[]"
                                        {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $specialization->category }}
                                    </label>
                                </div>
                            @endforeach
                            @error('specializations')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        @else
                            {{-- Altrimenti prendiamo i dati dal db e checchiamo i nostri checkbox corrispondenti --}}
                            @foreach ($specializations as $specialization)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $specialization->id }}"
                                        name="specializations[]"
                                        {{ $doctor->specializations()->get()->contains($specialization->id)? 'checked': '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $specialization->category }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                        {{-- TO-DO: 
                            inserito per evitare auto complete value in password --}}
                        <input type="password" class="d-none" name="" id="">

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
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
                        {{-- CURRENT PASSWORD --}}
                        <div class="mb-3">
                            <label for="old-password" class="form-label text-md-right">Old Password</label>

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
                        {{-- NEW PASSWORD --}}
                        <div class="mb-3">
                            <label for="password" class="form-label text-md-right">Password</label>

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
                        {{-- NEW PASSWORD CONFIRM --}}
                        <div class="mb-3">
                            <label for="password-confirm" class="col-form-label text-md-right">Confirm Password</label>

                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation">
                        </div>
                        <div class="mb-3"></div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
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
                        <input class="btn btn-primary" type="submit" value="Salva">
                    </form>
                </div>
            @else
                {{-- Messaggio di errore --}}
                <div class="col">
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            Stai tentando di modificare un altro utente!
                            <a class="text-danger" href="{{ route('default') }}">Back to Home</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <form action="{{ route('profile.destroy', $doctor->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip"
                title='Delete'>Delete</button>
        </form>
    </div>
@endsection
