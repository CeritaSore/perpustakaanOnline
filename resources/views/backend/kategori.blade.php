@extends('backend.index')
@php
    $no = 1;
@endphp
@section('container')
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-xl-0">
                <h3 class="font-weight-bold">Kategori</h3>
                <h6 class="font-weight-normal">Cari kategori yang kamu mau!
                </h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
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
                                <th>kategori</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listkategori as $kategori)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$kategori->kategori}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $kategori->idkategori }}"><i
                                                class="ti-pencil"></i></button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1{{ $kategori->idkategori }}"><i
                                                class="ti-eye"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2{{ $kategori->idkategori }}"><i
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
                <h5 class="modal-title" id="exampleModalLabel-2">Masukan kategori</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('up2') }}" method="post" enctype="multipart/form-data">
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
@foreach ($listkategori as $kategori)
    <div class="modal fade" id="exampleModal{{ $kategori->idkategori }}" tabindex="-1" role="dialog"
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
                    <form action="{{ route('edit2', $kategori->idkategori) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputName1"
                                placeholder="Name" value="{{ $kategori->kategori }}">
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
@foreach ($listkategori as $kategori)
    <div class="modal fade" id="exampleModal1{{ $kategori->idkategori }}" tabindex="-1" role="dialog"
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
                            <h1 class="mb-4">{{ $kategori->kategori }}</h1>
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
@foreach ($listkategori as $kategori)
    <div class="modal fade" id="exampleModal2{{ $kategori->idkategori }}" tabindex="-1" role="dialog"
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
                    <form action="{{ route('delete2', $kategori->idkategori) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputName1"
                                placeholder="Name" value="{{ $kategori->kategori }}">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach