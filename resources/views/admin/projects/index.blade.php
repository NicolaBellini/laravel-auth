@extends('layouts.admin')

@section('content')

<h1>index projects</h1>

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
            <td class="w-25">
                <input type="text" value="{{$project->name}}">
            </td>
             <td class="w-25">
                <input type="text" value="{{$project->topic}}">
            </td>
              <td class="w-25">
                <input type="text" value="{{$project->difficulty}}">
            </td>
            <td class="d-flex">
                <form action="">
                    <button>modifica</button>
                </form>
                <form action="">
                    <button>elimina</button>
                </form>

            </td>

        </tr>
    @endforeach

  </tbody>
</table>


@endsection
