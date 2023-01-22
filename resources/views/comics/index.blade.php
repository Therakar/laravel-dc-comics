{{-- è la mia view che lavoretà con il mio metodo index --}}

@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Lista Comics</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Price</th>
                <th scope="col">Series</th>
                <th scope="col">Sale Date</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($comics as $comic)
                <tr>
                    <td>{{$comic->id}}</td>
                    <td>{{$comic->title}}</td>
                    <td>{{$comic->price}}</td>
                    <td>{{$comic->series}}</td>
                    <td>{{$comic->sale_date}}</td>
                    <td>{{$comic->type}}</td>
                    <td class="d-flex">
                      
                      <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary me-1">Info</a>{{-- tasto info --}}
                      <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-primary me-1">Edit</a>{{-- tasto edit --}}

                      {{-- form delete --}}
                      <form action="{{route('comics.destroy',  $comic->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="sumit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                </tr>    
              @endforeach
            </tbody>
          </table>

          <a href="{{ route('comics.create') }}" class="btn btn-primary">Crea un nuovo fumetto</a>
    </div>
@endsection