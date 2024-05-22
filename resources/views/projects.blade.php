@extends('layouts.guest')

@section('content')

<div class="text-center">

    <ul>


    @foreach ($data as $item)

    <li class="mt-3 list-unstyled ">
    nome: {{$item->name}}<br>

    difficoltà: {{$item->difficulty}}<br>

    argomento: {{$item->topic}}

    </li>

    @endforeach
    </ul>
</div>

@endsection
