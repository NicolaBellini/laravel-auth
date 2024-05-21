@extends('layouts.guest')

@section('content')

@foreach ($data as $item)

<li>{{$item->name}}</li>

@endforeach

@endsection
