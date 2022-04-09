@extends('layouts.admin')
@section('title')
    show
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container show-message-w pt-1 pb-1">
        <div class="row ">
            <div class="col pb-2">
                <h1 class="text-uppercase">Dettagli messaggio</h1>
                {{-- <h1>Dettagli messaggio</h1> --}}

                <hr>

                <h3>Email: {{ $message->email }}</h3>

                <p>Ricevuto da: {{ $message->firstname }} {{ $message->lastname }}, il giorno
                    {{ Carbon\Carbon::parse($message->created_at)->format('d-m-y') }} alle ore
                    {{ Carbon\Carbon::parse($message->created_at)->format('H:i') }}</p>
                <p>
                    <b class="text-underline"><em>Contenuto del messaggio</em></b><br>
                    {{ $message->content }}
                </p>

                <a class="btn btn-primary" href="{{ route('messages.index') }}">indietro</a>

            </div>
        </div>
    </div>
@endsection
