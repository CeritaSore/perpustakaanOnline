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
    <div class="col-1 col-xl-12 grid-margin">
        <div class="row justifiy-content-around">
            @foreach ($listbuku as $buku)
                <div class="col-4 col-xl-3 mb-4">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="" style="max-height:15rem; overflow:hidden;">
                            <img src="{{ $buku->foto }}" class="card-img-top" alt="{{ $buku->judul_buku }}">
                        </div>
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
                        <div class="form-group">
                            <label for="tahun">Tahun terbit</label>
                            <input type="number" name="tahun" class="form-control" id="tahun" placeholder="Name"
                               oninput="justNumber(this)">
                        </div>
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
                    <div class="form-group">
                        <label for="exampleInputName1">Deskripsi(opsional)</label>
                        <input type="text" name="deskripsi" class="form-control" id="exampleInputName1"
                            placeholder="Name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="formFile" class="form-label">Masukan foto(opsional)</label>
                        <input class="form-control" name="foto" type="file" id="formFile">
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
{{-- edit data --}}
@foreach ($listbuku as $buku)
    <div class="modal fade" id="exampleModalEdit{{ $buku->idbuku }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-dialog-scrollable">
                <div class="modal-header">
                    <h5 class="modal-long-title" id="exampleModalLabel-2">Edit Buku</h5>
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
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Deskripsi(opsional)</label>
                            <input type="text" name="deskripsi" class="form-control" id="exampleInputName1"
                                placeholder="Name" value="{{ $buku->deskripsi }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">Masukan foto(opsional)</label>
                            <div style="max-height: 20rem;overflow:hidden;">

                                <img src="{{ $buku->foto }}" alt="" class="img-thumbnail">
                            </div>
                            <input class="form-control" value="" name="foto" type="file"
                                id="formFile">
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
    <div class="modal fade" id="exampleModalDelete{{ $buku->idbuku }}" tabindex="-1" role="dialog"
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
                                <img src="{{ $buku->foto }}" alt="{{ $buku->judul_buku }}"
                                    class="rounded-circle img-fluid" style="width: 100px; height:100px" />
                            </div>
                            <h4 class="mb-2">{{ $buku->judul_buku }}</h4>
                            <p class="text-muted mb-4">{{ $buku->pengarang->nama_pengarang }}<span
                                    class="mx-2">|</span> <a href="#!"
                                    class="text-muted">{{ $buku->kategori->kategori }}</a>
                            </p>
                            <div class="d-flex justify-content-center">

                                <h4 class=" text-capitalize d-block text-center {{ $buku->status_buku === 'tersedia' ? 'text-bg-success' : 'text-bg-danger' }}"
                                    style="width: 50%">
                                    {{ $buku->status_buku }}</h4>
                            </div>

                            <div class="d-flex justify-content-around text-center mt-5 mb-2">
                                @if ($buku->status_buku == 'sedang dipinjam')
                                    <a href="/pinjam" class="btn btn-danger disabled">
                                        <i class="ti-ticket"></i>
                                    </a>
                                @else
                                    <a href="/pinjam" class="btn btn-success">
                                        <i class="ti-ticket"></i>
                                    </a>
                                @endif

                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit{{ $buku->idbuku }}">
                                    <i class="ti-pencil"></i>

                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalDelete{{ $buku->idbuku }}">
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
{{-- <div class="modal fade" id="exampleModalPinjam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Peminjaman Buku</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('up4') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Judul Buku</label>
                        <select class="form-control" name="judul" id="exampleFormControlSelect2">
                            <option default>-- Pilih Buku --</option>
                            @foreach ($listbuku as $buku)
                                <option value="{{ $buku->idbuku }}">{{ $buku->judul_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tanggal Peminjaman</label>
                        <input type="date" name="tglpinjam" class="form-control" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tanggal Pengambilan</label>
                        <input type="date" name="tglambil" class="form-control" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Lama Peminjaman</label>
                        <input type="number" name="durasi" class="form-control" max='7'
                            id="exampleInputName1" oninput="valid(this)">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
           
        </div>
    </div>
</div> --}}
