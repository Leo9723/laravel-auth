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
        <button class="btn btn-success"><a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">Visualizza</a></button>
        <button class="btn btn-warning"><a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">Modifica</a></button>
        <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST">
               @csrf
               @method('DELETE')
               <button type="submit" class="confirm-delete-project btn btn-danger" data-title="{{ $project->title }}">Elimina</button>
            </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<button><a href="{{ route('admin.projects.create') }}">Aggiungi un progetto</a></button>

@include('admin.projects.modal_delete')
@endsection