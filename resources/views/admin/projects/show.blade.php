@extends('layouts.admin')

@section('content')


<h1>Titolo Progetto: {{ $single['title'] }}</h1>
<p>Descrizione Progetto: {{ $single['description'] }}</p>

@endsection('content')