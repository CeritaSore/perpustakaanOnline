<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listbuku = Buku::all();
        return view('backend.pinjam', compact('listbuku'));
    }
    public function status()
    {
        $listpinjam = Peminjaman::all();
        return view('backend.status', compact('listpinjam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeminjamanRequest $request)
    {
        // dd($request);
        Peminjaman::create([
            'buku_id' => $request->judul,
            'tgl_pinjam' => $request->tglpinjam,
            'tgl_ambil' => $request->tglambil,
            'lama_peminjaman' => $request->durasi,

        ]);
        return redirect('/status');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanRequest $request, $idpeminjaman)
    {
        // dd($request);
        $getpinjam = Peminjaman::find($idpeminjaman);
        // $getpinjam->status_peminjaman = $request->status;
        // $getpinjam->save();

        // $getbuku = Buku::find($request->idbuku);
        // if($getpinjam == 'approved'){
        //     $getbuku->status_buku = 'sedang dipinjam';
        //     $getbuku->save();
        // }
        if ($request->status == 'approved') {
            $getpinjam->status_peminjaman = 'approved';
            $getpinjam->save();

            $getbuku = Buku::find($request->idbuku);
            $getbuku->status_buku = 'sedang dipinjam';
            $getbuku->save();
        } else if ($request->status == 'returned') {
            $getpinjam->status_peminjaman = 'returned';
            $getpinjam->save();
            $getbuku = Buku::find($request->idbuku);
            $getbuku->status_buku = 'tersedia';
            $getbuku->save();
        } else {
            $getpinjam->status_peminjaman = 'pending';
            $getpinjam->save();
            $getbuku = Buku::find($request->idbuku);
            $getbuku->status_buku = 'tersedia';
            $getbuku->save();
        }
        return redirect('/status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idpeminjaman)
    {
        $delpeminjaman = Peminjaman::find($idpeminjaman);
        $delpeminjaman->delete();
        return redirect('/status');
    }
}
