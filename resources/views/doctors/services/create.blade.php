@extends('layouts.admin')
@section('title')
    Create service
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script>
        function createServicesValidation(e) {
            e.preventDefault();
            let errors = [];


            let type = document.getElementById('type');
            let checkType = document.getElementById('type_validate');
            if (type.value == "") {
                // let check = document.getElementById('type_validate');
                if (checkType) {
                    checkType.style.display = "block";
                    type.classList.add('is-invalid');
                    errors.push('type');
                }
            } else {
                checkType.style.display = "none";
                type.classList.remove('is-invalid');
            }


            let description = document.getElementById('description');
            let checkDesc = document.getElementById('description_validate');
            if (description.value == "") {
                checkDesc.style.display = "block";
                description.classList.add('is-invalid');
                errors.push('description');
            } else {
                // let checkDesc = document.getElementById('description_validate');
                checkDesc.style.display = "none";
                description.classList.remove('is-invalid');
            }

            let specialization = document.getElementById('specialization');
            console.log(specialization.value);


            let checkSpec = document.getElementById('specialization_validate');
            if (specialization.value == "") {
                checkSpec.style.display = "block";
                specialization.classList.add('is-invalid');
                errors.push('specialization');
            } else {
                // let checkSpec = document.getElementById('specialization_validate');
                checkSpec.style.display = "none";
                specialization.classList.remove('is-invalid');
            }

            if (errors.length > 0) {
                return false;
            } else {
                e.currentTarget.submit();
                return true;
            }
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('services.store') }}" method="post" onsubmit="createServicesValidation(event)">
                    @method('POST')
                    @csrf

                    <div class="form-group">
                        <label for="type">Title</label>
                        <input type="text" class="form-control" id="type" placeholder="Titolo servizio" name="type"
                            value="{{ old('type') }}">
                        @error('type')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <span id="type_validate" class="invalid-feedback" role="alert">
                            <strong>Compila questo campo </strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <span id="description_validate" class="invalid-feedback" role="alert">
                            <strong>Compila questo campo </strong>
                    </div>


                    <div class="form-group">
                        <select class="form-select" id="specialization" name="specialization_id">
                            <option value="">choose a specialization</option>
                            @foreach ($specs as $spec)
                                <option @if (old('specialization_id') == $spec->id) selected @endif value="{{ $spec->id }}"
                                    @if (in_array($spec->category, $user_specs)) class="bg-success" @endif>
                                    {{ $spec->category }}
                                </option>
                            @endforeach
                        </select>
                        @error('specialization_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <span id="specialization_validate" class="invalid-feedback" role="alert">
                            <strong>Compila questo campo </strong>
                        </span>
                        </span>
                    </div>
            </div>
            <div class="mb-3">

                <input class="btn btn-info" type="submit" value="Invia">
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
