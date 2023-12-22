<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use App\Http\Requests\StorePengarangRequest;
use App\Http\Requests\UpdatePengarangRequest;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listpengarang = Pengarang::all();
        return view('backend.pengarang', compact('listpengarang'));
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
    public function store(StorePengarangRequest $request)
    {
        //
        Pengarang::create([
            'nama_pengarang' => $request['nama'],
        ]);
        return redirect('/pengarang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengarang $pengarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengarang $pengarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengarangRequest $request, $idpengarang)
    {
        //
        // dd($idpengarang);
        $ambilpengarang  = Pengarang::find($idpengarang);
        $ambilpengarang->nama_pengarang = $request->nama;
        $ambilpengarang->save();
        return redirect('/pengarang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengarang $request,$idpengarang)
    {
        //
        // dd($idpengarang);
        $delpengarang = Pengarang::find($idpengarang);
        $delpengarang->delete();
        return redirect('/pengarang');
    }
}
