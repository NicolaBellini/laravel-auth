@extends('layouts.admin')

@section('content')

<h1>index projects</h1>
@foreach ($projectsList as $project)

<h1>{{$project->name}}</h1>

@endforeach

@endsection
