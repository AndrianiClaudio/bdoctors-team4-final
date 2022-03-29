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
                review details
                <h1>{{ $review->username }}</h1>
                <h2>
                    @for ($i = 1; $i <= $review->vote; $i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                    @for ($i = $review->vote; $i < 5; $i++)
                        <i class="bi bi-star"></i>
                    @endfor
                </h2>
                @if ($review->content)
                    <p>{{ $review->content }}</p>
                @endif
                <h3>{{ $review->created_at }}</h3>
                <a class="btn btn-primary" href="{{ route('reviews.index') }}">indietro</a>
            </div>
        </div>
    </div>
@endsection
