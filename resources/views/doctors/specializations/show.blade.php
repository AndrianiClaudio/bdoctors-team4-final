@extends('layouts.admin')
@section('title')
    specializations show
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <h1>
                        Dettagli specializzazione
                    </h1>
                    <hr>
                    <h2>{{ $spec->category }}</h2>
                    <p>
                        <em>
                            {{ $spec->description }}
                        </em>
                    </p>
                    <a class="btn btn-primary" href="{{ route('profile.show') }}">indietro</a>
                    <form action="{{ route('specializations.destroy', $spec->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger" />

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
