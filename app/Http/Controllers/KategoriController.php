<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listkategori = Kategori::all();
        return view('backend.kategori', compact('listkategori'));
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
    public function store(StoreKategoriRequest $request)
    {
        //
        // dd($request);
        Kategori::create([
            'kategori'=>$request->nama,
        ]);
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, $idkategori)
    {
        //
        // dd($request);
        $ambilkategori = Kategori::find($idkategori);
        $ambilkategori->kategori = $request->nama;
        $ambilkategori->save();
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $request,$idkategori)
    {
        // dd($request);
        $delKat = Kategori::find($idkategori);
        $delKat->delete();
        return redirect('/kategori');
    }
}
