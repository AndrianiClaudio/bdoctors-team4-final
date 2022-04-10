@extends('layouts.admin')
@section('script')
    <script src="{{ asset('js/front.js') }}" defer></script>
    <script src="{{ asset('js/translate_day.js') }}" defer></script>
@endsection

@php
// $expires = Carbon\Carbon::parse($expires);
// $expires_date = ;

$user = App\User::find(Auth::user()->id);
if (count($user->subscriptions()->get()) > 0) {
    $user_sub = $user->subscriptions()->first();
    $expires = Carbon\Carbon::parse($user_sub->pivot->expires_date);
    $expires_day_txt = $expires->englishDayOfWeek;
    $expires_week_month = $expires->weekOfMonth;
    // dd($expires);
}
@endphp

@section('content')
    <h2>Dr. {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
    <div id="fulvio" class="d-none">
        {{ Auth::user()->id }}
    </div>
    <div id="expires">
        <p class="lead">
            @if (count($user->subscriptions()->get()) > 0)
                {{-- @dd ($user->subscriptions()->first()->pivot->expires_date) --}}
                @php
                    $created = new Carbon\Carbon($user->subscriptions()->first()->pivot->expires_date);
                    $now = Carbon\Carbon::now();
                    $difference = $now->diffForHumans($created);
                    
                @endphp
                @if (explode(' ', $difference)[2] === 'after')
                    <b>
                        <em class="text-danger">
                            Il tuo abbonamento &eacute; scaduto in data {{ $created->format('d-m-Y') }}!
                        </em>
                    </b>
                @else
                    {{-- @if
                        @endif --}}
                    Hai gi&agrave; un abbonamento
                    <em class="text-uppercase">{{ $user_sub->name }}</em>
                    attivo che scadr&agrave; <span id="translate_day">{{ $expires_day_txt }}</span>
                    <span>{{ $expires->day }}</span>
                    <span id="translate_week_month">
                        {{ $expires->month }}
                    </span>
                    <span>{{ $expires->year }}</span>
                    alle ore
                    <span>{{ $expires->format('H:i') }}</span>
                    <br>
                @endif
            @endif
        </p>
    </div>
@endsection
