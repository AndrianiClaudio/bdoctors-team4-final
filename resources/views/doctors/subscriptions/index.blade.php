@extends('layouts.admin')
@section('script')
    <script src="{{ asset('js/front.js') }}" defer></script>
@endsection

@section('content')
    <h2>Dr. {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
    <div id="fulvio" class="d-none">
        {{ Auth::user()->id }}
    </div>
    {{-- @dd(App\Model\Subscription::all()); --}}
    {{-- @foreach (App\Model\Subscription::all() as $sub)
        <ul class="list-group">
            <li id="subscription-{{ $sub->id }}" class="list-group-item list-group-item-info"
                name="subscription-{{ $sub->id }}">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $sub->name }}</h4>
                        <div class="d-flex justify-content-between">
                            <b>
                                <em>Price: </em>{{ $sub->price }} &euro;
                            </b>
                            <b>
                                <em>Durata abbonamento: </em>{{ $sub->duration }} ore;
                            </b>
                        </div>
                        <div id="submit" class="submit">
                            <a href="/checkout?sub ={{ $sub->name }}">Procedi al pagamento</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    @endforeach --}}
@endsection
