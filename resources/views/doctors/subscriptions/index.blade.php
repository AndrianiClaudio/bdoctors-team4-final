@extends('layouts.admin')
@section('script')
    <script src="{{ asset('js/front.js') }}" defer></script>
    <script src="{{ asset('js/translate_day.js') }}" defer></script>
@endsection

@php
$expires = Carbon\Carbon::parse($expires);
$expires_day_txt = $expires->englishDayOfWeek;
$expires_week_month = $expires->weekOfMonth;
// $expires_date = ;
@endphp
@section('content')
    <h2>Dr. {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
    <div id="fulvio" class="d-none">
        {{ Auth::user()->id }}
    </div>
    <div id="expires">
        <strong>
            <em>
                Hai gi&aacute; un abbonamento attivo che scadr&aacute; <span
                    id="translate_day">{{ $expires_day_txt }}</span>
                <span>{{ $expires->day }}</span>
                <span id="translate_week_month">
                    {{ $expires->month }}
                </span>
                <span>{{ $expires->year }}</span>
                alle ore
                <span>{{ $expires->format('H:i') }}</span>
            </em>
        </strong>
    </div>
@endsection
