<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Str;

class FalkultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fakultas::all();
        return view('fakultas.index') -> with('dataFakultas',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(('fakultas.create'));
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
            'nama_fakultas' => 'required|unique:fakultas',
            'nama_dekan' => 'required',
            'nama_wakil_dekan' => 'required'
        ]);
       // dd($validasi);
       $validasi ['id']=Str::uuid();
        Fakultas::create($validasi);
       //buat objek dari model fakultas
    //    $fakultas = new Fakultas();
    //    $fakultas->nama_fakultas = $validasi['nama_fakultas'];
    //    $fakultas->nama_dekan = $validasi['nama_dekan'];
    //    $fakultas->nama_wakil_dekan = $validasi['nama_wakil_dekan'];
    //    $fakultas->save(); // simpan

       return redirect()->route(('fakultas.index'))->with('succes', "Data Fakultas ".$validasi ['nama_fakultas']." Berhasil Disimpan");
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
