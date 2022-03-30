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
            @if (count($services) > 0)
                <div class="col">
                    I tuoi servizi
                    @foreach ($services as $service)
                        <h2> {{ $service->type }} </h2>
                        <h3> {{ $service->category_name }}</h3>
                        <a class="btn btn-primary" href="{{ route('services.show', $service->id) }}">avanti</a>

                        {{-- SPECIALIZZAZIONE --}}
                    @endforeach
                </div>
            @else
                <div class="col">
                    <h2>Non hai ancora servizi inseriti!</h2>
                </div>
            @endif
            <div class="mb-3">
                <a class="btn btn-primary" href="{{ route('services.create') }}">Inserisci un tuo
                    servizio</a>
            </div>
        </div>
    </div>
@endsection
