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

<table class="table">
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
                <form action="">
                    <button>elimina</button>
                </form>

            </td>

        </tr>
    @endforeach

  </tbody>
</table>

<script>
function submitForm(id) {
    const form = document.getElementById(`form-edit-${id}`);
    form.submit();
    // console.log(form);
}

</script>


@endsection
