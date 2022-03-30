@extends('layouts.admin')
@section('title')
    Create service
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('services.update', $service) }}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titolo servizio"
                            name="type" value="{{ old('type', $service->type) }}">
                        @error('type')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrizione</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="form-select" name="specialization_id">
                            
                            <option value="">choose a specialization</option>
                            @foreach ($specs as $spec)
                                <option @if (old('specialization_id', $service->specialization_id) == $spec->id) $ selected @endif value="{{ $spec->id }}">
                                    {{ $spec->category }}
                                </option>
                                @endforeach
                            </select>
                        @error('specialization_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>
            <div class="mb-3">

                <input class="btn btn-info" type="submit" value="Invia">
            </div>
            </form>
        </div>
        <a class="btn btn-primary" href="{{ route('services.index') }}">indietro</a>
    </div>
    </div>
@endsection
