@extends('layouts.app')
@section('title')
    index
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">firstname</th>
                        <th scope="col">lastname</th>
                        <th scope="col">details</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                        <tr>
                        <td>{{ $doctor->id }}</td>
                        <td><h2>{{ $doctor->firstname }}</h2></td>
                        <td><h2>{{ $doctor->lastname }}</h2></td>
                        <td>
                            
                            <a class="btn btn-light" href="{{ route('admin.doctors.show', $doctor) }}">details</a>
                          
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.doctors.edit', $doctor) }}">edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="delete"></input>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                   
                
                
            </div>
        </div>
        {{ $doctors->links() }}
    </div>
@endsection