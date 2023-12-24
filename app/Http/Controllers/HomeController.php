<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function countBuku()
    {
        $totalbuku = Buku::count();
        $totalPending = Peminjaman::where('status_peminjaman','pending')->count();
        $totalApproved = Peminjaman::where('status_peminjaman','approved')->count();
        $totalReturn = Peminjaman::where('status_peminjaman','returned')->count();
        return view('backend.home', compact('totalbuku','totalPending','totalApproved','totalReturn'));
    }
}
