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
        <div class="container mt-3 text-white">
            <div class="row">
                <div class="col ms-3">
                    <div class="welcome-sizes welcome-bg d-flex flex-column justify-content-end ps-2">
                        <div class="data-sizes position-absolute data-abs ms-2 ps-1 pe-1">
                        <i class="fa-solid fa-calendar-days"></i> {{  now()->toDateTimeString() }}</div>
                        <h1 class="text-capitalize">Buongiorno Dr. {{ $doctor->firstname }} {{ $doctor->lastname }}</h1>
                        <p>Si ricordi sempre di respirare</p>
                    </div>
                </div>
                <div class="col">
                    <div class=" text-black ">
                        <h3 class="profile-title text-white text-center m-0 d-inline-block">Profile</h3>
                        <div class="profile-sizes">
                            maron com'è bell stu caz
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection
