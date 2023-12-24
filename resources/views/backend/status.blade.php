@extends('backend.index')
@section('container')
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-xl-0">
                <h3 class="font-weight-bold">Status peminjaman</h3>
                <h6 class="font-weight-normal">Periksa status buku yang kamu pinjam!
                </h6>

            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-capitalize">Nama</th>
                                <th class="text-capitalize">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($listpinjam as $pinjam)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>Peminjaman {{ $pinjam->idpeminjaman }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalView{{ $pinjam->idpeminjaman }}">
                                            <i class="ti-eye"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@foreach ($listpinjam as $pinjam)
    <div class="modal fade" id="exampleModalView{{ $pinjam->idpeminjaman }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Peminjaman Buku</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4">
                                <img src="..." alt="..." class="rounded-circle img-fluid"
                                    style="width: 100px;" />
                            </div>
                            <h4 class="mb-2">Peminjaman {{ $pinjam->idpeminjaman }}</h4>
                            <p class="text-muted mb-4">Judul Buku<span class="mx-2">|</span>
                                <a href="#!" class="text-muted">{{ $pinjam->buku->judul_buku }}</a>
                            </p>
                            <p class="text-muted mb-4">Dipinjam pada<span class="mx-2">|</span>
                                <a href="#!" class="text-muted">{{ $pinjam->tgl_pinjam }}</a>
                            </p>
                            <p class="text-muted mb-4">Akan diambil pada<span class="mx-2">|</span>
                                <a href="#!" class="text-muted">{{ $pinjam->tgl_ambil }}</a>
                            </p>
                            <p class="text-muted mb-4">Lama peminjaman<span class="mx-2">|</span>
                                <a href="#!" class="text-muted">{{ $pinjam->lama_peminjaman }} Hari</a>
                            </p>
                            <p class="text-muted mb-4">Status peminjaman<span class="mx-2">|</span>
                                <a href="#!" class="text-muted">{{ $pinjam->status_peminjaman }} </a>
                            </p>
                            <div class="d-flex justify-content-around text-center mt-5 mb-2">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit{{ $pinjam->idpeminjaman }}">
                                    <i class="ti-pencil"></i>

                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalDelete{{ $pinjam->idpeminjaman }}">
                                    <i class="ti-trash"></i>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
@php
    $stats = ['pending', 'approved','returned'];
@endphp
@foreach ($listpinjam as $pinjam)
    <div class="modal fade" id="exampleModalEdit{{ $pinjam->idpeminjaman }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Edit status</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('edit4',$pinjam->idpeminjaman)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <input type="hidden" name="idbuku" value="{{ $pinjam->buku->idbuku }}"
                                class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Status</label>
                            <select class="form-control" name="status" id="exampleFormControlSelect2">
                                <option default>-- pilih Status --</option>
                                @foreach ($stats as $status)
                                    <option value="{{ $status }}"
                                        {{ $status === $pinjam->status_peminjaman ? 'selected' : '' }}>
                                        {{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach
@foreach ($listpinjam as $pinjam)
    <div class="modal fade" id="exampleModalDelete{{ $pinjam->idpeminjaman }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Hapus data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>anda yakin ingin menghapus data?</h2>
                    <form action="{{route('delete4',$pinjam->idpeminjaman)}}" method="post">
                        @csrf
                        @method('delete')
                        
                        <button type="submit" class="btn btn-success">yes</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">no</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach
