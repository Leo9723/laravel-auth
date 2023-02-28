@extends('layouts.admin')

@section('content')

@if($errors->any())
<ul class="text-danger bg-black mb-0">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="form-cont">
    <form action="{{ route('admin.projects.update', $project->id)}}" method="POST">
    @csrf
    @method('PUT')


    <label for="title">Inserisci il nuovo titolo del progetto:</label><br>
    <input type="text" name="title" id="title" value="{{ old('title') ?? $project->title }}"><br>
    @error('title')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror


    <label for="title">Inserisci la nuova descrizione del progetto:</label><br>
    <textarea name="description" id="description" rows="10">{{ old('description') ?? $project->description }}</textarea><br>
    @error('description')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    
    <input type="submit" value="Invia" class="sub">
    
    
    </form>
</div>


@endsection('content')