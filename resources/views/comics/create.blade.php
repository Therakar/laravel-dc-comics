@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Crea un nuovo fumetto</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div> 
        @endif 
        <form action="{{ route('comics.store') }}" method="POST"> {{-- questa route è il posto in cui spedisco i dati inseriti nel form. Il metodo store si aspetta la richiesta in POST--}}
            @csrf {{-- grazie a questo token solo chi ha il nostro applicativo può fare il submit --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title*</label>
                <input type="text" name="title" id="title" class="form-control" maxlenght="50" required>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series*</label>
                <input type="text" name="series" id="series" class="form-control" maxlenght="50" required>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date*</label>
                <input type="date" name="sale_date" id="sale_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price*</label>
                <input type="text" name="price" id="price" class="form-control" step="any" min="1.99" max="9999.99" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type*</label>
                <select class="form-select" name="type" id="type">
                    <option selected>Open this select menu</option>
                    <option value="comic-book">Comic Book</option>
                    <option value="graphic-novel">Graphic Novel</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"><strong>Description*</strong></label>
                <textarea type="text" name="description" id="desciption" class="form-control" cols="50" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a href="{{route('comics.index')}}" class="btn btn-primary">Torna alla lista comics</a>
        </form>
        
    </div>
@endsection