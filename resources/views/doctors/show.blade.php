@extends('layouts.admin')
@section('title')
    show
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->id)
            <div class="row mt-3">
                <div class="col">
                    doctor name
                    <h1>{{ $doctor->firstname }} {{ $doctor->lastname }}</h1>
                    <img class="" src="{{ $doctor->photo }}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    doctor info
                    <ul>

                        <li>
                            <p>address: {{ $doctor->address }}</p>
                        </li>
                        <li>
                            <p>email: {{ $doctor->email }}</p>
                        </li>
                        <li>
                            <p>cv: {{ $doctor->cv }}</p>
                        </li>
                        <li>
                            <p>phone: {{ $doctor->phone }}</p>
                        </li>
                        <li>
                            <p>
                                Le tue specializzazioni
                            </p>
                            @if (count($doctor->specs) > 0)
                                <ul>
                                    @foreach ($doctor->specs as $spec)
                                        <li>
                                            <a href="{{ route('specializations.show', $spec->id) }}">
                                                <em>{{ $spec->category }}</em>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <a href="{{ route('profile.edit') }}">Inserisci specializzazioni nel tuo profilo</a>
                            @endif
                        </li>
                        <li>
                            <p>
                                I tuoi servizi
                            </p>
                            @if (count($doctor->services) > 0)
                                <ul>
                                    @foreach ($doctor->services as $service)
                                        <li>
                                            <a href="{{ route('services.show', $service->id) }}">
                                                <em>{{ $service->type }}</em>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <a href="{{ route('services.create') }}">Inserisci un tuo servizio</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
