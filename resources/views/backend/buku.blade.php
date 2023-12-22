@extends('backend.index')
@section('container')
    <div class="col-md-12 grid-margin ">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Daftar Buku</h3>
                <h6 class="font-weight-normal mb-4 text-capitalize">Temukan buku yang kamu inginkan dan <span
                        class="font-weight-bold">pinjam sekarang</span>!
                </h6>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Tambah buku<i class="ti-arrow-circle-right ms-1"></i></button>

            </div>
        </div>

    </div>
    <div class="col-md-4 grid-margin">
        <div class="row">
            @foreach ($listbuku as $buku)
                <div class="col-xl-4 col-12">
                    <div class="card text-center" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $buku->judul_buku }}</h5>
                            <p class="card-text">deskripsi(nanti)</p>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModalLook{{ $buku->idbuku }}">Tambah buku<i
                                    class="ti-arrow-circle-right ms-1"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="modal-backdrop fade show"></div> --}}
@endsection
{{-- input data --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Masukan Buku</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('up3') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Judul</label>
                        <input type="text" name="judul" class="form-control" id="exampleInputName1"
                            placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">pengarang</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="pengarang">
                            <option default>-- pilih pengarang --</option>
                            @foreach ($listpengarang as $pengarang)
                                <option value="{{ $pengarang->idpengarang }}">{{ $pengarang->nama_pengarang }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Penerbit</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="penerbit">
                            <option default>-- pilih penerbit --</option>
                            @foreach ($listpenerbit as $penerbit)
                                <option value="{{ $penerbit->idpenerbit }}">{{ $penerbit->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Kategori</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="kategori">
                            <option default>-- pilih kategori --</option>
                            @foreach ($listkategori as $kategori)
                                <option value="{{ $kategori->idkategori }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
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
@foreach ($listbuku as $buku)
    {{-- edit data --}}
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Edit Buku</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit3', $buku->idbuku) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputName1">Judul</label>
                            <input type="text" name="judul" value="{{ $buku->judul_buku }}"
                                class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">pengarang</label>
                            <select class="form-control" name="pengarang" id="exampleFormControlSelect2">
                                <option default>-- pilih pengarang --</option>
                                @foreach ($listpengarang as $pengarang)
                                    <option value="{{ $pengarang->idpengarang }}"
                                        {{ $pengarang->idpengarang === $buku->pengarang_id ? 'selected' : '' }}>
                                        {{ $buku->pengarang->nama_pengarang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Penerbit</label>
                            <select class="form-control" name="penerbit" id="exampleFormControlSelect2">
                                <option default>-- pilih pengarang --</option>
                                @foreach ($listpenerbit as $penerbit)
                                    <option value="{{ $penerbit->idpenerbit }}"
                                        {{ $penerbit->idpenerbit === $buku->penerbit_id ? 'selected' : '' }}>
                                        {{ $buku->penerbit->nama_penerbit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Kategori</label>
                            <select class="form-control" name="kategori" id="exampleFormControlSelect2">
                                <option default>-- pilih pengarang --</option>
                                @foreach ($listkategori as $kategori)
                                    <option value="{{ $kategori->idkategori }}"
                                        {{ $kategori->idkategori === $buku->kategori_id ? 'selected' : '' }}>
                                        {{ $buku->kategori->kategori }}</option>
                                @endforeach
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
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
{{-- delete --}}
@foreach ($listbuku as $buku)
    <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Hapus Buku</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">yakin igin menghapus?</h2>
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('delete3', $buku->idbuku) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>

                </div>
                {{-- <div class="modal-footer">
                
                
            </div> --}}
            </div>
        </div>
    </div>
@endforeach
{{-- look --}}
@foreach ($listbuku as $buku)
    <div class="modal fade" id="exampleModalLook{{ $buku->idbuku }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Detail</h5>
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
                            <h4 class="mb-2">{{ $buku->judul_buku }}</h4>
                            <p class="text-muted mb-4">{{ $buku->pengarang->nama_pengarang }}<span
                                    class="mx-2">|</span> <a href="#!"
                                    class="text-muted">{{ $buku->kategori->kategori }}</a>
                            </p>

                            <h4
                                class=" text-capitalize d-block {{ $buku->status_buku === 'tersedia' ? 'text-bg-success' : 'text-bg-danger' }}">
                                {{ $buku->status_buku }}</h4>

                            <div class="d-flex justify-content-around text-center mt-5 mb-2">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="ti-ticket"></i>
                                </button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit">
                                    <i class="ti-pencil"></i>

                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalDelete">
                                    <i class="ti-trash"></i>

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

{{-- peminjaman --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Masukan Buku</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">pengarang</label>
                        <select class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Penerbit</label>
                        <select class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Kategori</label>
                        <select class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </form>

            </div>
            {{-- <div class="modal-footer">
                
                
            </div> --}}
        </div>
    </div>
</div>
