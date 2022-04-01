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
                    <div class=" text-black" style = "width:100%">
                        <h6 class="profile-title text-white m-0 d-inline-block ps-2" style = "width:100%"">IL TUO PROFILO</h6>
                        <div class="edit-profile text-white ">
                            <a class="text-white" href="{{ route('profile.edit', Auth::user()->slug) }}">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        <div class="profile-sizes" >
                            maron com'è bell stu caz
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection
