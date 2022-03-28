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
                le tue reviews
               @foreach ($reviews as $review)
                    <h2>scritto dall'utente: @if (!$review->username) 
                        anonimo @else
                        {{ $review->username }}
                    @endif </h2>
                    <h2>{{ $review->created_at }}</h2>
                    <a class="btn btn-primary" href="{{ route('reviews.show', $review->id) }}">avanti</a>
               @endforeach
            </div>
        </div>
    </div>
@endsection