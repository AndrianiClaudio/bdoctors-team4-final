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
                service details
                <h1>{{ $service->type }}</h1>
                <p>{{ $service->description }}</p>

                {{-- SPECIALIZZAZIONE --}}
                <h2> {{ $service->category_name }}</h2>
                <a class="btn btn-primary" href="{{ route('services.index') }}">indietro</a>
            </div>
        </div>
    </div>
@endsection
