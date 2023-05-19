<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use GuzzleHttp\Client;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $dataprodi = Prodi::all();
        $data = Mahasiswa::with('prodi')
        ->where('nama_mahasiswa', 'LIKE', '%'. $search.'%')
        ->orWhere('kota_lahir', 'LIKE', '%'.$search.'%')
        ->orWhereHas('prodi', function($query) use($search) {
            $query ->where('nama_prodi', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('created_at', 'DESC')
        ->paginate(5);
        return view('mahasiswa.index')->with('mahasiswas',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $prodi = Prodi::orderBy('nama_prodi', 'ASC')->get();
        return view('mahasiswa.create', compact('prodi'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validasi = $request->validate([
            'nama_mahasiswa' =>'required',
            'npm' =>'required|unique:mahasiswas,npm',
            'tanggal_lahir' =>'required',
            'kota_lahir'=>'required',
            'foto' =>'required|file|image|max:5000',
            "prodi_id" =>'required'
        ]);

        $temp = $request->foto->getClientOriginalExtension();
        $nama_foto = $validasi['npm'] . '.' . $temp;
       $path = $request->foto->storeAs('public/images', $nama_foto);
       
        // dd($validasi);
        $mahasiswa = new Mahasiswa();
        
        $mahasiswa->nama_mahasiswa = $validasi['nama_mahasiswa'];
        $mahasiswa->npm = $validasi['npm'];
        $mahasiswa->tanggal_lahir = $validasi['tanggal_lahir'];
        $mahasiswa->kota_lahir = $validasi['kota_lahir'];
        $mahasiswa->foto =$nama_foto;
        $mahasiswa->prodi_id = $validasi['prodi_id'];
        

        //upload foto
        $ext = $request->foto->getClientOriginalExtension();
        $new_filename = $validasi['npm']. ".".$ext;
        $request->foto->storeAs('public', $new_filename);

        $mahasiswa->foto = $new_filename;
        $mahasiswa->save(); // simpan

        return redirect()->route('mahasiswa.index')->with('success',"Data ".$validasi['npm']. " berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('succes', 'Data Berhasil Dihapus!');
        
    }
    public function multiDelete(Request $request)
    {
        Mahasiswa::whereIn('id', $request->get('selected'))->delete();
        return response("Selected mahasiswa(s) delete succesfully.", 200);
    }
}