@extends('layouts.admin')

@section('script')
    {{-- <link rel="stylesheet" href="dashboard.scss"> --}}
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    @foreach ($subs as $sub)
        <div class="card p-3">
            <div class="card-title">
            </div>
            <div class="card-body">
                <b>{{ $sub->name }}</b>
                <em>{{ $sub->price }} &euro;</em>
            </div>
            <a href="#">Iscriviti</a>
        </div>
    @endforeach
@endsection
