@extends('layouts.admin')
@section('title')
    pippo
@endsection

@section('script')
    {{-- <link rel="stylesheet" href="dashboard.scss"> --}}
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

{{-- <!-- home -->
        -) Pagina informazioni (Il tuo profilo)
        -) Pagina messaggi ricevuti
        -) Pagina sponsorizzazione (Panoramica piani di abbonamento)
        -) Pagina statistiche (Grafico) --}}

@section('content')
    <div class="container-fluid text-white">
        <div class="row m-1200">
            <div class="col-7 ms-3 m-w-1200">
                <div class="welcome-sizes welcome-bg d-flex flex-column justify-content-end ps-2">
                    <div class="data-sizes position-absolute data-abs ms-2 ps-1 pe-1">
                        <i class="fa-solid fa-calendar-days"></i> {{ now('Europe/Rome')->toDateString() }}
                    </div>
                    <img class="img-sizes align-self-end" src="{{ asset('images/doctorDashboard.png') }}" alt="">
                    <h1 class="text-capitalize">Buongiorno Dr. {{ $doctor->firstname }} {{ $doctor->lastname }}</h1>
                    <p>Si ricordi sempre di respirare</p>
                </div>

            </div>
            <div class="col-4  m-1200-bedge m-w-1200">
                <div class="profile-preview ">
                    <h5 class="ps-2 pt-2 text-uppercase">Il tuo Bedge</h5>
                    <a class="edit-icon text-white text-decoration-none d-flex justify-content-center align-items-center me-3"
                        href="{{ route('profile.edit') }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                <div class="profile-sizes d-flex justify-m-1200 ">
                    <div class="profile-picture-preview mt-3 ms-3">

                        <img src="@if (Auth::user()->photo) http://localhost:8000/storage/{{ Auth::user()->photo }} @else https://www.ilcedrangolo.it/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png @endif"
                            alt="" width="100%" height="100%" class="rounded-circle me-2" />
                    </div>
                    <div class="  text-black ms-2 mt-4 text-capitalize">
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
                        <p class="pb-1 address-color"><i class="fa-solid fa-location-dot icon-color"></i> Via
                            {{ $doctor->address }}</p>
                        <hr class="mb-hr">
                        @if ($doctor->phone)
                            <p class="text-black mb-1"><i class="fa-solid fa-mobile color-phone"></i>
                                {{ $doctor->phone }}
                            </p>
                        @endif
                        <p><i class="     fa-solid fa-envelope email"></i> {{ $doctor->email }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-1200">
            <div class="col-7 ms-3 mt-3 m-w-1200">
                <div class="message-sizes welcome-nobg  d-flex justify-content-center align-items-center ps-2">
                    <h5 class="text-uppercase">I tuoi ultimi messaggi</h5>
                </div>
                <div class="preview-message text-black">
                    <ul class="ul-message">
                        @foreach ($doctor->messages()->orderBy('updated_at', 'desc')->limit(2)->get()
        as $message)
                            <li class="pt-2">
                                Inviato da: <p class="bold-p">{{ $message->email }}</p>
                                <p class="message mt-3 text-white ps-1 pe-1">{{ $message->content }}</p>

                            </li>
                            <hr>
                        @endforeach
                    </ul>
                    <a class="ms-4 mb-2" href={{ route('messages.index') }}>
                        Vedi tutti i tuoi messaggi
                    </a>
                </div>
            </div>
            <div class="col-4 m-1200-bedge m-w-1200">
                <div class="profile-preview pt-2 mt-3">
                    <h5 class="ps-2 text-uppercase">I tuoi servizi</h5>
                </div>
                <div class="service text-black">
                    <ul class="pt-2 ul-message">
                        @foreach ($doctor->services as $service)
                            <li>
                                <h2> {{ $service->type }} </h2>
                                <p>{{ $service->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row m-1200">
            <div class="col-7  ms-3 mt-3 m-w-1200">
                <div class="message-sizes welcome-nobg d-flex justify-content-center align-items-center ps-2 ">
                    <h5 class="text-uppercase">Le tue ultime recensioni</h5>
                </div>
                <div class="review text-black">
                    <ul class="ul-message">
                        @foreach ($doctor->reviews()->orderBy('updated_at', 'desc')->limit(2)->get()
        as $review)
                            <li class="pt-2">
                                Scritto dall'utente: <p class="d-inline bold-p">
                                    @if ($review->username)
                                        {{ $review->username }}
                                    @else
                                        Utente anonimo
                                    @endif
                                </p>
                                <p>
                                    @for ($i = 1; $i <= $review->vote; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                    @for ($i = $review->vote; $i < 5; $i++)
                                        <i class="bi bi-star"></i>
                                    @endfor
                                </p>
                                @if ($review->content)
                                    <p class=" message mt-3 text-white ps-1 pe-1">{{ $review->content }}</p>
                                @else
                                    <p>Questa recensione non ha un testo</p>
                                @endif
                                <hr>
                            </li>
                        @endforeach
                    </ul>
                    <a class="ms-4" href={{ route('reviews.index') }}>
                        Vedi tutte le tue recensioni
                    </a>
                </div>
            </div>
            <div class="col-4 m-1200-bedge m-w-1200">
                <div class="profile-preview pt-2 mt-3">
                    <h5 class="ps-2 text-uppercase">I tuoi abbonamenti attivi</h5>
                </div>
                <div class="service text-black">
                    @if (count($doctor->subscriptions()->get()) > 0)
                        <b>
                            <em class="text-uppercase">
                                {{ $doctor->subscriptions()->first()->name }}
                            </em>
                            <hr>
                            <em>Scadenza: </em>
                            {{ Carbon\Carbon::parse($doctor->subscriptions()->first()->expires_date)->format('y-m-d H:i') }}
                        </b>
                        <hr>
                        <em>
                            <a href="{{ route('subscription.index') }}">Desideri allungare la durata del tuo
                                abbonamento?</a>

                        </em>
                    @else
                        <b>
                            <em class="text-danger">
                                Non sei ancora abbonato. Cosa stai aspettando?<a
                                    href="{{ route('subscription.index') }}">Abbonati</a> per essere in cima alla
                                ricerca.

                            </em>
                        </b>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
