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
                I tuoi servizi
                @foreach ($services as $service)
                    <h2> {{ $service->type }} </h2>
                    <h3> {{ $service->category_name }}</h3>
                    <a class="btn btn-primary" href="{{ route('services.show', $service->id) }}">avanti</a>

                    {{-- SPECIALIZZAZIONE --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection
