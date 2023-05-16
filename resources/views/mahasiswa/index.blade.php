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
                  <h4 class="card-title">Data</h4>
                 
                  <div class="table-responsive">

                    <table class="table table-striped">
                      <thead>

                        <tr>
                            <th>Nama</th>
                            <TH>NPM</TH>
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
                                  <td>{{$item->nama_mahasiswa}}</td>
                                  <td>{{$item->npm}}</td>
                                  <td>{{ DateTime::createFromFormat('Y-m-d', $item->tanggal_lahir)->format('d F Y') }}</td>
                                  <td>{{$item->kota_lahir}}</td>
                                  <td><img src="{{  asset('storage/images/' . $item->foto) }}" alt="Foto" class="img-fluid"></td>
                                  <td>{{$item->Prodi->nama_prodi}}</td>
                                  <td>{{$item->created_at}}</td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="d-flex justify-content-end mt-3">
                      
                      <a href="{{ route('mahasiswa.create')}} " class="btn btn-rounded btn-dark">Add Data</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
@endsection