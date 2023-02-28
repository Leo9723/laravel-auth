@extends('layouts.admin')
@section('content')


<h1>Progetti</h1>

<table class="table table-dark table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titolo</th>
      <th scope="col">Descrizione</th>
      <th scope="col">azioni</th>
    </tr>
  </thead>
  <tbody>
  @foreach($projects as $project)
    <tr>
      <th scope="row">{{ $project['id'] }}</th>
      <td>{{ $project['title'] }}</td>
      <td>{{ $project['description'] }}</td>
      <td>
        <button>V</button>
        <button>M</button>
        <button>E</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<button><a href="{{ route('admin.projects.create') }}">Aggiungi un progetto</a></button>


@endsection