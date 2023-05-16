@extends('layout.main')

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
                            <input type="text" class="form-control" name="nama_prodi" placeholder="Nama Prodi"
                                value="{{ old('nama_prodi') }}">
                            @error('nama_prodi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_fakultas">Nama Fakultas</label>
                            <select name="nama_fakultas" class="form-control js-example-basic-single">
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_fakultas }}</option>
                                @endforeach
                            </select>
                            @error('nama_fakultas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-rounded btn-success me-2">Save</button>
                        <a href="{{ route('prodi.index') }}" class="btn btn-rounded btn-danger">Cancel</a>
                    </form>

                </div>
            @endsection
