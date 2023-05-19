@extends('layout.main')

@section('title', 'Halaman Mahasiswa')
@section('subtitle', 'Data Mahasiswa')

@section('content')
    @section('credit','Universitas Multi Data Palembang')


     <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @if (Session::get('success'))
                      <div class="alert alert-success">
                          {{Session::get('success')}}
                      </div>

                  @endif
                  <h4 class="card-title">Data Mahasiswa</h4>
                  <div class="my-3 col-12 col-sm-8 col-md-6">
                    <form action="" method="GET">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Cari Mahasiswa(NPM, Nama, Kota Lahir, Prodi)">
                        <button class="input-group-text btn btn-rounded btn-dark">Cari</button>
                      </div>
                    </form>
                  </div>
                 
                  <div class="table-responsive">

                    <table class="table table-striped">
                      <thead>

                        <tr>
                          <th><input type="checkbox" class="check-all"></th>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Tanggal Lahir</th>
                            <th>Kota Lahir</th>
                            <th>Foto</th>
                            <th>Prodi</th>
                            <th>Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($mahasiswas as $item)
                              <tr>
                                <td><input type="checkbox"></td>
                                  <td>{{$item->nama_mahasiswa}}</td>
                                  <td>{{$item->npm}}</td>
                                  <td>{{ DateTime::createFromFormat('Y-m-d', $item->tanggal_lahir)->format('d F Y') }}</td>
                                  <td>{{$item->kota_lahir}}</td>
                                  <td><img src="{{  asset('storage/images/' . $item->foto) }}" alt="Foto" class="img-fluid"></td>
                                  <td>{{$item->Prodi->nama_prodi}}</td>
                                  <td>{{$item->created_at}}</td>
                                  <td>
                                    <form method="post" class="delete-form" data-route="{{ route ('mahasiswa.destroy', $item->id)}}">
                                      @method('delete')
                                      @csrf 
                                      <button type="submit" class="btn btn-rounded btn-danger">Hapus</button></form>
                                      
                                  </td>
                                  
                              </tr>
                              
                          @endforeach
                          
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">
                      <a href="{{ route('mahasiswa.create')}} " class="btn btn-rounded btn-dark">Tambah Data</a> 
                    <button class="btn btn-rounded btn-danger" id="multi-delete" data-route="{{ route('mhs-multi-delete') }}">Hapus Semua</button>
                  </div>
                  <div class="d-flex justify-content-end mt-3">
                  </div>
                    <div class="mt-4" style="display: flex; justify-content:center;">
                       {{$mahasiswas->withQueryString()->links()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection