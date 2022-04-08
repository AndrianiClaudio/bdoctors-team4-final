@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/front.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
@endsection

@section('content')
    {{ $reviews }}
    <div id="fulvio" class="d-none">{{ Auth::id() }}</div>
    {{-- <div>
        <canvas id="myChart" width="400" height="400"></canvas>
    </div> --}}
@endsection
