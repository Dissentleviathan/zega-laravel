@extends('layout.master')

@section('title', 'Halaman Fakultas')
@section('subtitle', 'Fakultas')


@section('content')
@section('credit', 'Universitas Multi Data Palembang')

<table class="table table-hover">
    <thead>
        <tr>
            <th>Nama Fakultas</th>
            <TH>Nama Dekan</TH>
            <th>Nama Wakil Dekan</th>
            <th>Prodi</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataFakultas as $item)
            <tr>
                <td>{{ $item->nama_fakultas }}</td>
                <td>{{ $item->nama_dekan }}</td>
                <td>{{ $item->nama_wakil_dekan }}</td>
                <td>
                    @foreach ($item->prodi as $prodi)
                        {{ $prodi->nama_prodi }}
                    @endforeach
                </td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
