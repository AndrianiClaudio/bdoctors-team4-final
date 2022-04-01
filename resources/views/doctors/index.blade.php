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
                        <h6>Il tuo Profilo</h6>
                        <a class="edit-icon text-white text-center" href="{{ route('profile.edit', Auth::user()->slug) }}">
                            <i class="fa-solid fa-pen-to-square v-al-icon"></i>
                        </a>
                    </div>
                    <div class="profile-sizes d-flex">
                        <div class="profile-picture-preview mt-3 ms-3">
                            <img src="http://localhost:8000/storage/{{Auth::user()->photo }}" alt="" width="100%" height ="100%"
                                    class="rounded-circle me-2">
                        </div>
                        <div class="text-black ms-2 mt-4 text-capitalize">
                            <h6 class="bold-prev">Dr. {{ $doctor->firstname }} {{ $doctor->lastname }}</h6>
                            <ul class="ul-spec mb-1 p-0">
                                @foreach ($doctor->specializations as $spec)
                                    <li>
                                        <a href="{{ route('specializations.show', $spec->id) }}">
                                            <em>{{ $spec->category }}</em>
                                         </a>
                                     </li>
                                   @endforeach
                            </ul>
                            <p class="pb-1 address-color"><i class="fa-solid fa-location-dot icon-color"></i>  Via {{ $doctor->address }}</p>
                            <hr>
                           
                        
                    </div>
                </div>
            </div>
        </div>
    
@endsection
