@extends('layouts.admin')
@section('title')
    show
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container-show ms-3 me-3">
        @if (Auth::user()->id)
        
        <div class="show-title d-flex align-items-center">
            <h4 class="text-uppercase text-white mb-0 ms-3">Il tuo profilo</h4>
        </div>

        <div class="row mt-3">
            <div class="col-2 d-flex justify-content-center">
                <img src="http://localhost:8000/storage/{{ Auth::user()->photo }}" class="rounded-circle" alt="">
            </div>
            <div class="col d-flex flex-column justify-content-between">
                <div class="row">
                    <div class="col">
                        <h1> Dr. {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="text-uppercase text-secondary">
                            @if (count($doctor->specs) > 0)
                            @foreach ($doctor->specs as $spec)
                                    <a class="text-reset" href="{{ route('specializations.show', $spec->id) }}">{{ $spec->category }}{{ !($loop->last) ? ',' : '' }}</a>
                            @endforeach
                            @else
                                <a href="{{ route('profile.edit') }}">Inserisci una specializzazione</a>
                            @endif
                        </h3>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-uppercase fw-bold">Email</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="text-secondary">{{ $doctor->email }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-uppercase fw-bold">Telefono</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="text-secondary">{{ $doctor->phone }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-center">
                        <h4 class="d-flex align-items-center text-secondary">
                            <i class="fa-solid me-2 fa-location-dot icon-opt"></i> {{ $doctor->address }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
            


            {{-- <div class="row mt-3">
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
            </div> --}}
        @endif
    </div>
@endsection
