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
                <h1>Le tue recensioni</h1>
            </div>
        </div>
        <div class="row w-title-message bg-message">
            <div class="col-12">
                 @foreach ($reviews as $review)
                    <p class="pt-3 d-inline fs-4">Recensione dall'utente: 
                        @if (!$review->username)
                            Utente
                        @else
                            {{ $review->username }}
                        @endif</p>
                    <a class="btn btn-primary text-white" href="{{ route('reviews.show', $review->id) }}">Dettagli</a>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
