@extends('layouts.admin')
@section('title')
    show
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                Dettagli messaggio
                <h1>{{ $message->email }}</h1>

                <h2>From : {{ $message->firstname }} {{ $message->lastname }}</h2>

                <p>{{ $message->content }}</p>

                <h3>{{ $message->created_at }}</h3>
                <a class="btn btn-primary" href="{{ route('messages.index') }}">indietro</a>
            </div>
        </div>
    </div>
@endsection
