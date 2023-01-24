@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Modifica: {{$comic->title}}</h1> 
        <form action="{{ route('comics.update', $comic->id) }}" method="POST"> {{-- questa route è il posto in cui spedisco i dati inseriti nel form e inserisco l'id della risorsa. Il metodo update si aspetta la richiesta in PUT o PATCH ma method accetta solo GET e POST--}}
            @csrf {{-- grazie a questo token solo chi ha il nostro applicativo può fare il submit --}}
            @method('PUT'){{-- visto che non posso passare al method qua sopra qualcosa di diverso da GET o POST passo ciò che mi serve al @method qua a fianco--}}
            <div class="mb-3">
                <label for="title" class="form-label">Title*</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$comic->title}}" maxlenght="50" required>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series*</label>
                <input type="text" name="series" id="series" class="form-control" value="{{$comic->series}}" maxlenght="50" required>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date*</label>
                <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{$comic->sale_date}}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price*</label>
                <input type="text" name="price" id="price" class="form-control" value="{{$comic->price}}" step="any" min="1.99" max="9999.99" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type*</label>
                <select class="form-select" name="type" id="type">
                    <option value="comic-book" {{ $comic->type === 'comic-book' ? 'selected' : null }}>Comic Book</option>
                    <option value="graphic-novel" {{ $comic->type === 'graphic-novel' ? 'selected' : null }}>Graphic Novel</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"><strong>Description*</strong></label>
                <textarea type="text" name="description" id="desciption" class="form-control"  cols="50" rows="10">{{$comic->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a href="{{route('comics.index')}}" class="btn btn-primary">Torna alla lista comics</a>
        </form>
        
    </div>
@endsection