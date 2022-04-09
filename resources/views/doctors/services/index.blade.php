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
                <h4 class="text-uppercase mb-0 py-2">I tuoi servizi</h4>
            </div>
        </div>
        <div class="row w-title-message bg-message">
            <div class="col-12">
                 @if (count($services) > 0)
                 @foreach ($services as $service)
                 <div class="pt-3">
                    <p class="b-service d-inline">Servizio:</p> 

                    <p class="d-inline">{{ $service->category_name }} </p>
                </div>
                <div class="pt-2 pb-2">
                    <p class="b-service d-inline">Descrizione:</p>
                    <p class="d-inline">{{ $service->type }}</p>
                </div>
                       
                    {{-- <a class="btn btn-primary text-white" href="{{ route('services.show', $service->id) }}">Dettagli</a> --}}
                    <hr>
                @endforeach
            </div>
            @else
                <div class="col">
                    <h2>Non hai ancora servizi inseriti!</h2>
                </div>
            @endif
            <div class="mb-3">
                <a class="btn btn-primary text-white" href="{{ route('services.create') }}">Inserisci un nuovo
                    servizio</a>
            </div>
        </div>
    </div>
@endsection
