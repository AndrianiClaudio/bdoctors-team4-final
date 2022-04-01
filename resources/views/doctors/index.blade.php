@extends('layouts.admin')
@section('title')
    pippo
@endsection

@section('script')
    <link rel="stylesheet" href="dashboard.scss">
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

    {{-- 
         <!-- home -->
        -) Pagina informazioni (Il tuo profilo)
        -) Pagina messaggi ricevuti
        -) Pagina sponsorizzazione (Panoramica piani di abbonamento)
        -) Pagina statistiche (Grafico)
    --}}

@section('content')
        <div class="container-fluid mt-3 text-white">
            <div class="row">
                <div class="col-7 ms-3">
                    <div class="welcome-sizes welcome-bg d-flex flex-column justify-content-end ps-2">
                        <div class="data-sizes position-absolute data-abs ms-2 ps-1 pe-1">
                        <i class="fa-solid fa-calendar-days"></i> {{  now('Europe/Rome')->toDateString() }}</div>
                        <h1 class="text-capitalize">Buongiorno Dr. {{ $doctor->firstname }} {{ $doctor->lastname }}</h1>
                        <p>Si ricordi sempre di respirare</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="profile-preview">
                        <h6>profilo</h6>
                        <a class="edit-icon" href="{{ route('profile.edit', Auth::user()->slug) }}">
                            <i class="fa-solid fa-pen-to-square v-al-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
@endsection
