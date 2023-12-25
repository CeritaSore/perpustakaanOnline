@extends('backend.index')
@section('container')
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome Aamir</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have
                    <span class="text-primary">3 unread alerts!</span>
                </h6>
                <p>waktu saat ini adalah : {{$waktusaatini}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin">
        <div class="row justify-content-around">
            <div class="col-xl-4 mb-4 stretch-card transparent">
                <div class="card" style="background-color:#6ea8fe; color:white;">
                    <div class="card-body">
                        <p class="mb-4">Total buku</p>
                        <p class="fs-30 mb-2">{{ $totalbuku }}</p>
                        <p>buku</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4 stretch-card transparent">
                <div class="card" style="background-color:#dc3545; color:white;">
                    <div class="card-body">
                        <p class="mb-4">Total peminjaman(pending)</p>
                        <p class="fs-30 mb-2">{{ $totalPending }}</p>
                        <p>tiket</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4 stretch-card transparent">
                <div class="card" style="background-color:#1a734b; color:white;">
                    <div class="card-body">
                        <p class="mb-4">Total peminjaman(approved)</p>
                        <p class="fs-30 mb-2">{{ $totalApproved }}</p>
                        <p>tiket</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4 stretch-card transparent">
                <div class="card" style="background-color:#6ea8fe; color:white;">
                    <div class="card-body">
                        <p class="mb-4">Total pengembalian</p>
                        <p class="fs-30 mb-2">{{ $totalReturn }}</p>
                        <p>tiket</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4 stretch-card transparent">
                <div class="card" style="background-color:#6ea8fe; color:white;">
                    <div class="card-body">
                        <p class="mb-4">Total pengguna aktif</p>
                        <p class="fs-30 mb-2"></p>
                        <p>orang</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4 stretch-card transparent">
                <div class="card" style="background-color:#dc3545; color:white;">
                    <div class="card-body">
                        <p class="mb-4">Total pengguna tidak aktif</p>
                        <p class="fs-30 mb-2"></p>
                        <p>orang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
