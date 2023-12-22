<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use App\Http\Requests\StorePenerbitRequest;
use App\Http\Requests\UpdatePenerbitRequest;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listpenerbit = Penerbit::all();
        return view('backend.penerbit', compact('listpenerbit'));
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
    public function store(StorePenerbitRequest $request)
    {
        //
        Penerbit::create([
            'nama_penerbit' => $request->nama,
        ]);
        return redirect('/penerbit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbit $penerbit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenerbitRequest $request, $idpenerbit)
    {
        //
        // dd($idpenerbit);
        $ambilPenerbit = Penerbit::find($idpenerbit);
        $ambilPenerbit->nama_penerbit = $request->nama;
        $ambilPenerbit->save();
        return redirect('/penerbit');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbit $request,$idpenerbit)
    {
        //
        // dd($idpenerbit);
        $delPenerbit = Penerbit::find($idpenerbit);
        $delPenerbit->delete();
        return redirect('/penerbit');
    }
}
