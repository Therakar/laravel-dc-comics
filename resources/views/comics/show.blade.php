@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1><strong>Title: </strong>{{$comic->title}}</h1>
        <h3><strong>Series: </strong>{{$comic->series}}</h3>
        <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
        <p><strong>Price: </strong>{{$comic->price}}$</p>
        <p><strong>Sale Date: </strong>{{$comic->sale_date}}</p>
        <p><strong>Type: </strong>{{$comic->type}}</p>
        <p><strong>Description: </strong>{!! $comic->description !!}</p> {{-- {{$comic->description}} --}}
        <a href="{{route('comics.index')}}" class="btn btn-primary">Torna alla lista comics</a>
    </div>
@endsection