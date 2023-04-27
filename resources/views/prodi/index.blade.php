@extends('layout.master')

@section('title', 'Halaman Prodi')
@section('subtitle', 'Program Studi')


@section('content')
    @section('credit','Universitas Multi Data Palembang')

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama Prodi</th>
                <th>Nama Fakultas</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodis as $item)
            <tr>
                <td>{{$item->nama_prodi}}</td>
                 <td>{{$item->Fakultas->nama_fakultas}}</td>
                 <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
@endsection

