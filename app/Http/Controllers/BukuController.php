<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Pengarang;
use App\Models\Penerbit;
use App\Models\Kategori;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listbuku = Buku::all();
        $listpengarang = Pengarang::all();
        $listpenerbit = penerbit::all();
        $listkategori = kategori::all();
        return view('backend.buku', compact('listbuku', 'listpengarang', 'listpenerbit', 'listkategori'));
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
    public function store(StoreBukuRequest $request)
    {
        // dd($request);
        Buku::create([
            'judul_buku' => $request->judul,
            'pengarang_id' => $request->pengarang,
            'penerbit_id' => $request->penerbit,
            'kategori_id' => $request->kategori,
        ]);
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, $idbuku)
    {
        // dd($request);
        $ambilBuku = Buku::find($idbuku);
        $ambilBuku->judul_buku = $request->judul;
        $ambilBuku->pengarang_id = $request->pengarang;
        $ambilBuku->penerbit_id = $request->penerbit;
        $ambilBuku->kategori_id = $request->kategori;
        $ambilBuku->save();
        return redirect('/buku');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $request,$idbuku)
    {
        // dd($idbuku);
        $delbuku = Buku::find($idbuku);
        $delbuku->delete();
        return redirect('/buku');

    }
}
