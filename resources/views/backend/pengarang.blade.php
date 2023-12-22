@extends('backend.index')
@php
    $no = 1;
@endphp
@section('container')
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-xl-0">
                <h3 class="font-weight-bold">Pengarang</h3>
                <h6 class="font-weight-normal">Cari pengarang Favoritemu!
                </h6>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Tambah Data<i class="ti-arrow-circle-right ms-1"></i></button>
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
                                <th>Pengarang</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listpengarang as $pengarang)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pengarang->nama_pengarang }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $pengarang->idpengarang }}"><i
                                                class="ti-pencil"></i></button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1{{ $pengarang->idpengarang }}"><i
                                                class="ti-eye"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2{{ $pengarang->idpengarang }}"><i
                                                class="ti-trash"></i></button>
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
{{-- input --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Masukan Pengarang</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('up') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName1"
                            placeholder="Name">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </form>

            </div>
            {{-- <div class="modal-footer">
                
                
            </div> --}}
        </div>
    </div>
</div>
{{-- edit --}}
@foreach ($listpengarang as $pengarang)
    <div class="modal fade" id="exampleModal{{ $pengarang->idpengarang }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Edit Data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit', $pengarang->idpengarang) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputName1"
                                placeholder="Name" value="{{ $pengarang->nama_pengarang }}">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    </form>

                </div>
                {{-- <div class="modal-footer">
                
                
            </div> --}}
            </div>
        </div>
    </div>
@endforeach
{{-- view --}}
@foreach ($listpengarang as $pengarang)
    <div class="modal fade" id="exampleModal1{{ $pengarang->idpengarang }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">View Data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <h1 class="mb-4">{{ $pengarang->nama_pengarang }}</h1>
                            <div class="mb-4 pb-2">
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-facebook-f fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-skype fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="modal-footer">
                
                
            </div> --}}
            </div>
        </div>
    </div>
@endforeach
{{-- delete --}}
@foreach ($listpengarang as $pengarang)
    <div class="modal fade" id="exampleModal2{{ $pengarang->idpengarang }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Delete Data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('delete', $pengarang->idpengarang) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputName1"
                                placeholder="Name" value="{{ $pengarang->nama_pengarang }}">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
