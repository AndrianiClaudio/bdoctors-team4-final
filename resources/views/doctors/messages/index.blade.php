@extends('layouts.admin')
@section('title')
    index
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row welcome-bg w-title-message text-white">
            <div class="col-12">
                <h1>I tuoi messaggi</h1>
            </div>
        </div>
        <div class="row w-title-message bg-message">
            <div class="col-12">
                 @foreach ($messages as $message)
                    <p class="pt-3 d-inline fs-4">Messaggio arrivato il {{ $message->created_at }} dall'utente:</p>
                    <p class="user-email-b fs-4"> {{ $message->email }}<p>
                    <a class="btn btn-primary text-white" href="{{ route('messages.show', $message->id) }}">Dettagli</a>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
