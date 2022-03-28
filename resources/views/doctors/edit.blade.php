@extends('layouts.admin')

@section('title')
    edit
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
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
                    <form action="{{ route('profile.update', $doctor->slug) }}" method="POST">
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
                        </div>
                        {{-- specialization --}}
                        
                      
                        @error('specializations.*')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                        @if ($errors->any())
                        @foreach ($specializations as $specialization)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $specialization->id }}" name="specializations[]"
                                    {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $specialization->category }}
                                </label>
                            </div>
                        @endforeach
                    @else
                        {{-- Altrimenti prendiamo i dati dal db e checchiamo i nostri checkbox corrispondenti --}}
                        @foreach ($specializations as $specialization)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $specialization->id }}" name="specializations[]"
                                    {{ $doctor->specializations()->get()->contains($specialization->id) ? 'checked': '' }}>
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
    </div>
@endsection
