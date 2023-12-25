<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;

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
        // Validasi input form
        $request->validate([
            'judul' => 'required', // Sesuaikan dengan aturan validasi untuk buku_id
            'tglpinjam' => 'required|date',
            'tglambil' => 'required|date',
            'durasi' => 'required|numeric|min:1',
        ]);

        // Ambil data input dari form
        $bukuId = $request->judul; // Sesuaikan dengan nama field yang sesuai
        $tanggalPeminjaman = Carbon::parse($request->tglpinjam);
        $tanggalPengambilan = Carbon::parse($request->tglambil);
        $lamaPeminjaman = $request->durasi;

        // Hitung tanggal pengembalian
        $tanggalPengembalian = $tanggalPengambilan->copy()->addDays($lamaPeminjaman);

        // Tentukan batas maksimal lama peminjaman (contoh: 7 hari)
        $batasMaksimalPeminjaman = 7;

        // Periksa apakah lama peminjaman melebihi batas maksimal
        if ($lamaPeminjaman > $batasMaksimalPeminjaman) {
            return redirect()->back()->with('warning', 'Lama peminjaman melebihi batas maksimal (7 hari).');
        }

        // Simpan data peminjaman ke database
        Peminjaman::create([
            'buku_id' => $bukuId,
            'tgl_pinjam' => $tanggalPeminjaman,
            'tgl_ambil' => $tanggalPengambilan,
            'lama_peminjaman' => $lamaPeminjaman,
            'tgl_kembali' => $tanggalPengembalian, // Simpan tanggal pengembalian ke database
        ]);

        return redirect('/status');
    }
    // public function store(StorePeminjamanRequest $request)
    // {
    //     // dd($request);
    //     // Validasi input form
    //     $request->validate([
    //         'judul' => 'required', // Sesuaikan dengan aturan validasi untuk buku_id
    //         'tglpinjam' => 'required|date',
    //         'tglambil' => 'required|date',
    //         'durasi' => 'required|numeric|min:1',
    //     ]);
    //     $bukuId = $request->judul; // Sesuaikan dengan nama field yang sesuai
    //     $tanggalPeminjaman = Carbon::parse($request->tglpinjam);
    //     $tanggalPengambilan = Carbon::parse($request->tglambil);
    //     $lamaPeminjaman = $request->durasi;

    //     $tanggalPengembalian = $tanggalPengambilan->copy()->addDays($lamaPeminjaman);

    //     $batasMaksimalPeminjaman = 7;

    //     // Periksa apakah lama peminjaman melebihi batas maksimal
    //     if ($lamaPeminjaman > $batasMaksimalPeminjaman) {
    //         return redirect()->back()->with('warning', 'Lama peminjaman melebihi batas maksimal (7 hari).');
    //     }
    //     Peminjaman::create([
    //         'buku_id' => $bukuId,
    //         'tgl_pinjam' => $tanggalPeminjaman,
    //         'tgl_ambil' => $tanggalPengambilan,
    //         'lama_peminjaman' => $lamaPeminjaman,
    //         'tgl_kembali' => $tanggalPengembalian,

    //     ]);
    //     return redirect('/status');
    // }

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
