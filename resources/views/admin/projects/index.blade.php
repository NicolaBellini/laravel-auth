@extends('layouts.admin')

@section('content')

<a href="{{route('admin.projects.create')}}" class="btn btn-success ">crea nuovo progetto</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">titolo</th>
      <th scope="col">argomento</th>
      <th scope="col">difficolta</th>
      <th scope="col">azioni</th>


    </tr>
  </thead>
  <tbody>
@foreach ($projectsList as $project)
    <tr>
        <th scope="row">{{$project->name}}</th>
        <td>{{$project->topic}}</td>
        <td>{{$project->difficulty}}</td>
        <td>
            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning ">modifica</a>

            <a href="{{route('admin.projects.destroy', $project)}}" class="btn btn-danger ">elimina</a>

        </td>


    </tr>

@endforeach

  </tbody>
</table>


@endsection
