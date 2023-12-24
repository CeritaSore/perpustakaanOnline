<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

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
        $request->validate([
            'judul' => 'required|min:3|max:100',
            'pengarang' => 'exists:pengarangs,idpengarang',
            'penerbit' => 'exists:penerbits,idpenerbit',
            'kategori' => 'exists:kategoris,idkategori',
            'tahun' => 'required|numeric',
            'deskripsi' => 'nullable|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ]);
        $buku = new Buku();
        $buku->judul_buku = $request->judul;
        $buku->pengarang_id = $request->pengarang;
        $buku->penerbit_id = $request->penerbit;
        $buku->kategori_id = $request->kategori;
        $buku->tahun_terbit = $request->tahun;

        $buku->deskripsi = $request->deskripsi;
        $buku->foto = $request->foto;
        if ($request->hasFile('foto')) {
            // Pindahkan file foto hanya jika ada file yang diunggah
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $fileName = 'buku_' . time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/buku'), $fileName);

            $buku->foto = 'assets/buku/' . $fileName;
        } else {
            $buku->foto = ''; // Set foto menjadi string kosong jika tidak ada file yang diunggah
        }
        $buku->save();
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
        $request->validate([
            'judul' => 'required|min:3|max:100',
            'pengarang' => 'exists:pengarangs,idpengarang',
            'penerbit' => 'exists:penerbits,idpenerbit',
            'kategori' => 'exists:kategoris,idkategori',
            'deskripsi' => 'nullable|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $ambilBuku = Buku::find($idbuku);
        $ambilBuku->judul_buku = $request->judul;
        $ambilBuku->pengarang_id = $request->pengarang;
        $ambilBuku->penerbit_id = $request->penerbit;
        $ambilBuku->kategori_id = $request->kategori;
        $ambilBuku->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus foto lama jika ada
            if ($ambilBuku->foto && file_exists(public_path($ambilBuku->foto))) {
                unlink(public_path($ambilBuku->foto));
            }

            // Upload foto baru
            $fileName = 'buku_' . time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/buku'), $fileName);
            $ambilBuku->foto = 'assets/buku/' . $fileName;
        }
        $ambilBuku->save();
        return redirect('/buku');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idbuku)
    {
        // dd($idbuku);
        $delbuku = Buku::find($idbuku);
        if (!$delbuku) {
            return redirect('/buku')->with('error', 'Buku tidak ditemukan.');
        }

        // Hapus foto yang bersangkutan jika ada
        if ($delbuku->foto) {
            $fotoPath = public_path($delbuku->foto);

            // Periksa apakah file foto benar-benar ada sebelum dihapus
            if (File::exists($fotoPath)) {
                // Hapus file foto
                File::delete($fotoPath);
            }
        }
        $delbuku->delete();
        return redirect('/buku');
    }
}
