@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>{{$comic->title}}</h1>
        <p>{!! $comic->description !!}</p> {{-- {{$comic->description}} --}}
        

        <a href="{{route('comics.index')}}" class="btn btn-primary">Torna alla lista comics</a>
    </div>
@endsection