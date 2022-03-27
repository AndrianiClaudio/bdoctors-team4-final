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

            {{-- Modifica possibile solo a se stessi --}}
            @if ($doctor->id === Auth::id())
                <div class="col">
                    <form action="{{ route('admin.doctors.update', $doctor) }}" method="POST">
                        @csrf
                        @method('PATCH')

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
                        <div class="mb-3">
                            <label for="password" class="form-label">Change Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="password">
                            @error('password')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
