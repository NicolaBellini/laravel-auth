@extends('layouts.admin')

@section('content')


<h1>

   edit form
</h1>

@if (session('error'))
    <div class="alert alert-danger">
        <ul>
             <li>{{ session('error') }}</li>
        </ul>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <form action="{{route('admin.projects.update', $project)}}" method="post" >
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="formGroupExampleInput" class="form-label">nome Progetto</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput"  name="name" value="{{old('name', $project->name)}}">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput2" class="form-label">argomento progetto</label>
      <input type="text" class="form-control @error('topic') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Another input placeholder" name="topic" value="{{old('topic', $project->topic)}}">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput3" class="form-label">difficoltà progetto</label>
      <input type="text" class="form-control @error('difficulty') is-invalid @enderror" id="formGroupExampleInput3" placeholder="Another input placeholder" name="difficulty" value="{{old('difficulty', $project->difficulty)}}">
    </div>
    {{-- <div class="mb-3">
      <label for="formGroupExampleInput3" class="form-label">difficoltà progetto</label>
      <input type="file" class="form-control" id="formGroupExampleInput3" placeholder="Another input placeholder" name="image" onchange="showimage(event)">
    </div>
    <img src="" id="thumb" alt=""> --}}

    <div class="d-flex justify-content-end w-100 ">

        <button type="submit" class="btn btn-warning me-3">modifica</button>
        <form class="mt-3" action="{{route('admin.projects.destroy', $project)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger ">elimina</button>

        </form>

    </div>


    </form>

</div>

@endsection
