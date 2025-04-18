<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tokos = Toko::latest()->get();
        return view('tokos.index', compact('tokos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_toko' => 'required',
        'pemilik' => 'required',
        'alamat' => 'required',
        'telepon' => 'required'
    ]);

    Toko::create($request->all());

    return response()->json(['success' => 'Toko berhasil ditambahkan']);
}

    /**
     * Display the specified resource.
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $toko = Toko::findOrFail($id);
        return response()->json($toko);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_toko' => 'required',
            'pemilik' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        Toko::find($id)->update($request->all());

        return response()->json(['success' => 'Toko berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Toko::find($id)->delete();
        return response()->json(['success' => 'Toko berhasil dihapus']);
    }
}
