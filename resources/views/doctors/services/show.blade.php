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
                service details
                <h1>{{ $service->type }}</h1>
                <p>{{ $service->description }}</p>

                {{-- SPECIALIZZAZIONE --}}
                <h2> {{ $service->category_name }}</h2>
                <a class="btn btn-primary" href="{{ route('services.index') }}">indietro</a>
                <a class="btn btn-primary" href="{{ route('services.edit', $service->id) }}">edit</a>
                 <form action="{{ route('services.destroy', $service->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="delete"></input>
                        </form>
            </div>
        </div>
    </div>
    
@endsection
