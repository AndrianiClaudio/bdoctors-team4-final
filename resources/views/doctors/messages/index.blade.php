@extends('layouts.admin')
@section('title')
    index
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                I tuoi messaggi
                @foreach ($messages as $message)
                    <h2>scritto dall'utente: {{ $message->email }}
                    </h2>
                    <h2>{{ $message->created_at }}</h2>
                    <a class="btn btn-primary" href="{{ route('messages.show', $message->id) }}">avanti</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
