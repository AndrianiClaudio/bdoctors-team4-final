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
                <h1>Dettagli messaggio</h1>

                <hr>

                <h3>Email: {{ $message->email }}</h3>

                <p>Ricevuto da: {{ $message->firstname }} {{ $message->lastname }}</p>
                <p>il: {{ $message->created_at }}</p>

                <p>{{ $message->content }}</p>

                <a class="btn btn-primary" href="{{ route('messages.index') }}">indietro</a>
                {{-- <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger" />

                </form> --}}
            </div>
        </div>
    </div>
@endsection
