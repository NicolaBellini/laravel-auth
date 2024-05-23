@extends('layouts.admin')

@section('content')


<h1>

   create form
</h1>

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
    <form action="{{route('admin.projects.store')}}" method="post" >
    @csrf
    <div class="mb-3">
      <label for="formGroupExampleInput" class="form-label">nome Progetto</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput"  name="name" value="{{old('name')}}">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput2" class="form-label">argomento progetto</label>
      <input type="text" class="form-control @error('topic') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Another input placeholder" name="topic" value="{{old('topic')}}">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput3" class="form-label">difficoltà progetto</label>
      <input type="text" class="form-control @error('difficulty') is-invalid @enderror" id="formGroupExampleInput3" placeholder="Another input placeholder" name="difficulty" value="{{old('difficulty')}}">
    </div>
    {{-- <div class="mb-3">
      <label for="formGroupExampleInput3" class="form-label">difficoltà progetto</label>
      <input type="file" class="form-control" id="formGroupExampleInput3" placeholder="Another input placeholder" name="image" onchange="showimage(event)">
    </div>
    <img src="" id="thumb" alt=""> --}}


    <button type="submit" class="btn btn-success ">invia</button>

    </form>
</div>

@endsection

{{-- <script>
function showimage(event){

    const thumb = document.getElementById('thumb');
    thumb.src = URL.createObjectURL(event.target.file[0]);
}

</script> --}}
