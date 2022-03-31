@extends('layouts.app')

@section('script')

@endsection

@section('content')
    <div class="container">
        {{-- @foreach ($errors->all() as $err)
            <div class="alert alert-danger" role="alert">
                <strong>{{ $err }}</strong>
            </div>
        @endforeach --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" onsubmit="return handleData()">
                            @csrf


                            {{-- FIRSTNAME --}}
                            <div class="form-group row">
                                <label for="firstname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" 
                                        class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                        value="{{ old('firstname') }}" autocomplete="firstname" autofocus required>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- LASTNAME --}}
                            <div class="form-group row">
                                <label for="lastname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" autocomplete="lastname" autofocus required>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- EMAIL --}}
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD CONFIRM --}}
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password" required>
                                </div>
                            </div>

                            {{-- SPECIALIZATIONS --}}

                            <div class="form-group row">
                                <label for="specializations"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Specializations') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        @foreach ($spec as $spec_value)
                                            {{-- @dd($spec_value) --}}
                                            <div>
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $spec_value->id }}" name="specializations[]"
                                                    @if (in_array($spec_value->id, old('specializations', []))) checked @endif>

                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $spec_value->category }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div style="visibility:hidden; color:red; " id="chk_option_error">
                                        Please select at least one option.
                                    </div>
                                    @error('specializations')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- ADDRESS --}}
                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" autocomplete="address" autofocus required>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    {{-- SUBMIT --}}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
