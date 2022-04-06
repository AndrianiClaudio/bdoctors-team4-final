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
                <h1>Dettagli recensioni</h1>

                <hr>

                <h2>
                    @for ($i = 1; $i <= $review->vote; $i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                    @for ($i = $review->vote; $i < 5; $i++)
                        <i class="bi bi-star"></i>
                    @endfor
                </h2>

                <p>{{ $review->username }}</p>

                @if ($review->content)
                    <p>{{ $review->content }}</p>
                @else
                    <p>Questa recensione non ha un testo</p>
                @endif

                <a class="btn btn-primary" href="{{ route('reviews.index') }}">indietro</a>
                {{-- <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger" />

                </form> --}}
            </div>
        </div>
    </div>
@endsection
