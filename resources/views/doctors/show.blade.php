@extends('layouts.admin')
@section('title')
    show
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                doctor name
                <h1>{{ $doctor->firstname }} {{ $doctor->lastname }}</h1>
                <img class="container-fluid" src="{{ $doctor->photo }}" alt="">
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
                </ul>
            </div>
        </div>
    </div>
@endsection
