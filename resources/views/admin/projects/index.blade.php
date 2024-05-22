@extends('layouts.admin')

@section('content')

<h1>index projects</h1>

@if($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
    @endforeach
</div>
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">
 {{session('error')}}
</div>

@endif

@if(session('success'))
 <div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

@if(session('deleted'))
 <div class="alert alert-success" role="alert">
    {{session('deleted')}}
</div>

@endif

<div class="container-fluid d-flex ">
<form action="{{route('admin.projects.store')}}" method="post">
    @csrf
    <label for="Name">Nome progetto</label>
    <input type="text" id="name" name="name" class="me-3">

    <label for="topic">Argomento progetto</label>
    <input type="text" id="topic"  name="topic"  class="me-3">

    <label for="difficulty">Difficoltà progetto</label>
    <input type="text" id="difficulty" name="difficulty"  class="me-3">

    <button type="submit">crea</button>

</form>
</div>

<table class="table edit-table">
    <thead>
        <tr>
            <th scope="col">titolo</th>
            <th scope="col">topic</th>
            <th scope="col">difficoltà</th>
            <th scope="col">azioni</th>

        </tr>
    </thead>
    <tbody>
    @foreach ($projectsList as $project)
        <tr>
            <form action="{{route('admin.projects.update', $project)}}" id="form-edit-{{$project->id}}" method="post">
                @csrf
                @method('PUT')

                <td class="w-25">
                    <input type="text" value="{{$project->name}}" name="name">
                </td>
                 <td class="w-25">
                    <input type="text" value="{{$project->topic}}" name="topic">
                </td>
                  <td class="w-25">
                    <input type="text" value="{{$project->difficulty}}" name="difficulty">
                </td>
            </form>
            <td class="d-flex">
                <button onclick="submitForm({{$project->id}})">modifica</button>
                <form action="{{route('admin.projects.destroy', $project)}}" method="post" id="form-edit-{{$project->id}}">
                    @csrf
                    @method('DELETE')
                    <button href="{{route('admin.projects.destroy', $project)}}" class="btn btn-danger" onclick="submitForm({{$project->id}})" type="submit">elimina</button>
                </form>

            </td>

        </tr>
    @endforeach

  </tbody>
</table>


{{-- script --}}
<script>
function submitForm(id) {
    const form = document.getElementById(`form-edit-${id}`);
    form.submit();
    // console.log(form);
}

</script>


@endsection
