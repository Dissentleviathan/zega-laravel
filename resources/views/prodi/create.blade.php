@extends('layout.master')

@section('title', 'Tambah Prodi')
@section('subtitle', 'Prodi')
@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Prodi</h4>
                    <p class="card-description">
                        Formulir Tambah Prodi
                    </p>
                    <form class="forms-sample" action="{{ route('prodi.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_fakultas">Nama Prodi</label>
                            <input type="text" class="form-control" name="nama_prodi" placeholder="Nama Prodi">
                            @error('nama_prodi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_fakultas">Nama Fakultas</label>
                            <input type="text" class="form-control" name="nama_fakultas" placeholder="Nama Fakultas">
                            @error('nama_fakultas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ route('prodi.index') }}" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            @endsection
