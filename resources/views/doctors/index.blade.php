@extends('layouts.admin')
@section('title')
    index
@endsection

@section('script')
    <link rel="stylesheet" href="dashboard.scss">
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

    {{-- 
        -) Pagina informazioni (Il tuo profilo)
        -) Pagina messaggi ricevuti
        -) Pagina sponsorizzazione (Panoramica piani di abbonamento)
        -) Pagina statistiche (Grafico)
    --}}

@section('content')

<div class="d-flex flex-column flex-shrink-0 bg-light side-sizes">
    {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr> --}}
    <ul class="nav nav-pills flex-column mb-auto lh-5 fs-5">
      <li class="nav-item">
        <a href="{{route('profile.show', $doctors->slug)}}" class="nav-link active" aria-current="page">
          {{-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg> --}}
          <i class="fa-solid fa-user-doctor p-1"></i>
          Il tuo profilo
        </a>
      </li>
      <li>
        <a href="{{route('profile.show', $doctors->slug)}}" class="nav-link link-dark">
          {{-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> --}}
          <i class="fa-solid fa-comment-medical p-1"></i>
          Messaggi
        </a>
      </li>
      <li>
        <a href="{{route('profile.show', $doctors->slug)}}" class="nav-link link-dark">
          {{-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg> --}}
          <i class="fa-regular fa-star p-1"></i>
          Piani di abbonamento
        </a>
      </li>
      <li>
        <a href="{{route('profile.show', $doctors->slug)}}" class="nav-link link-dark">
          {{-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg> --}}
          <i class="fa-solid fa-chart-line p-1"></i>
          Le tue statistiche
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown ps-3 pb-2">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">Gestisci le tue prestazioni</a></li>
        <li><a class="dropdown-item" href="{{ route('profile.edit', $doctors->slug) }}">Modifica profilo</a></li>
        <li><a class="dropdown-item" href="{{route('profile.show', $doctors->slug)}}">Profilo</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

    {{-- <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">firstname</th>
                            <th scope="col">lastname</th>
                            <th scope="col">details</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    <h2>{{ $doctors->firstname }}</h2>
                                </td>
                                <td>
                                    <h2>{{ $doctors->lastname }}</h2>
                                </td>
                                <td>

                                    <a class="btn btn-light" href="{{ route('profile.show', $doctors->slug) }}">details</a>

                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('profile.edit', $doctors->slug) }}">edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('profile.destroy', $doctors->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="delete"></input>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@endsection
