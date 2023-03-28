@extends('layout.master')

@section('title', 'Halaman Fakultas')
@section('subtitle', 'Fakultas')
@section('content')

{{-- <h2>Fakultas</h2> --}}
{{-- <p>Ini halaman fakultas</p> --}}
{{-- {{ $fikr }} --}}

<ul>
@foreach ($dataFakultas as $item)
    <li>{{$item}}</li>
@endforeach
</ul>
@endsection