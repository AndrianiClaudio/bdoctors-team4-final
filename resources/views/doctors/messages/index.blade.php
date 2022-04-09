@extends('layouts.admin')
@section('title')
    index
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row welcome-nobg w-title-message text-white">
            <div class="col-12">
                <h4 class="text-uppercase mb-0 py-2">I tuoi messaggi</h4>
            </div>
        </div>
        <div class="row w-title-message bg-message">
            <div class="col-12">
                @foreach ($messages as $message)
                    <p class="pt-3 d-inline fs-4">
                        Messaggio arrivato il
                        {{ Carbon\Carbon::parse($message->created_at)->format('d-m-y') }} alle ore
                        {{ Carbon\Carbon::parse($message->created_at)->format('H:i') }}
                        @if ($message->username)
                            dall'utente: {{ $message->username }}
                        @else
                            da un utente anonimo
                        @endif
                    </p>
                    <p class="user-email-b fs-4">
                            {{ $message->email }}
                    <p>
                        <a class="btn btn-primary text-white"
                            href="{{ route('messages.show', $message->id) }}">Dettagli</a>
                        <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
