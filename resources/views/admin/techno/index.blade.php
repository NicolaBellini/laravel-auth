@extends('layouts.admin')

@section('content')

<h1>index technology</h1>

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
<form action="{{route('admin.technology.store')}}" method="post">
    @csrf
    <label for="Name">Nome Tecnologia</label>
    <input type="text" id="name" name="name" class="me-3">

    <button class="btn btn-succes" type="submit">crea</button>

</form>
</div>

<table class="table edit-table">
    <thead>
        <tr>
            <th scope="col">titolo</th>
            <th scope="col">azioni</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($technoList as $techno)
        <tr>
            <form action="{{route('admin.technology.update', $techno)}}" id="form-edit-{{$techno->id}}" method="post">
                @csrf
                @method('PUT')

                <td class="w-25">
                    <input type="text" value="{{$techno->name}}" name="name">
                </td>

            </form>


            <td class="d-flex">
            <button onclick="submitForm({{$techno->id}})">modifica</button>

             <form action="{{route('admin.technology.destroy', $techno)}}" method="post" id="form-edit-{{$techno->id}}">
                @csrf
                @method('DELETE')
                <button onclick="submitForm({{$techno->id}})" class="btn btn-danger">Elimina</button>
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