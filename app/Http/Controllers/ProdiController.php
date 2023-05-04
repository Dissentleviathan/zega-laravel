<?php

namespace App\Http\Controllers;


use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(){
        $prodi = Prodi::all();
        // dd($prodi);
        return view('prodi.index')->with('prodis', $prodi);
    }
    public function create()
    {
        return view(('prodi.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->nama_fakultas);

        //validasi data
        $validasi = $request->validate([
            'nama_fakultas' => 'required',
            'nama_dekan' => 'required',
            'nama_wakil_dekan' => 'required'
        ]);
       // dd($validasi);

       //buat objek dari model fakultas
       $prodi = new Prodi();
       $prodi->nama_prodi = $validasi['nama_prodi'];
       $prodi->nama_fakultas = $validasi['nama_fakultas'];
       $prodi->save(); // simpan

       return redirect()->route(('fakultas.index'))->with('succes', "Data Prodi ".$validasi ['nama_prodi']." Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


