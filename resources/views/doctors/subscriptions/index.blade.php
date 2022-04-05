@extends('layouts.admin')

@section('script')
    {{-- <link rel="stylesheet" href="dashboard.scss"> --}}
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    @foreach ($subs as $sub)
        <form
            action='http://localhost:8000/api/subscription/payment/make?token=fake-valid-nonce&amount={{ $sub->price }}&user_id={{ Auth::id() }}'
            method="post">
            <div class="card p-3">
                <div class="card-title">
                </div>
                <div class="card-body">
                    <b>{{ $sub->name }}</b>
                    <em>{{ $sub->price }} &euro;</em>
                </div>
                <a class="btn btn-success" type="submit">Iscriviti</a>
            </div>
        </form>
    @endforeach
@endsection
