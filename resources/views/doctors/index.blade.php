@extends('layouts.admin')
@section('title')
    index
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            
                            <th scope="col">firstname</th>
                            <th scope="col">lastname</th>
                            <th scope="col">details</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    <h2>{{ $doctors->firstname }}</h2>
                                </td>
                                <td>
                                    <h2>{{ $doctors->lastname }}</h2>
                                </td>
                                <td>

                                    <a class="btn btn-light" href="{{ route('doctors.show', $doctors) }}">details</a>

                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('doctors.edit', $doctors) }}">edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('doctors.destroy', $doctors->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="delete"></input>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
