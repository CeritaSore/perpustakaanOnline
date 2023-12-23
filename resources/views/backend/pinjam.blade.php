@extends('backend.index')
@section('container')
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome Aamir</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have
                    <span class="text-primary">3 unread alerts!</span>
                </h6>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Judul Buku</label>
                        <select class="form-control" name="judul" id="exampleFormControlSelect2">
                            <option default>-- Pilih Buku --</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
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
                        <input type="number" name="durasi" class="form-control" max='7' id="exampleInputName1" oninput="valid(this)">
                    </div>
                    <button type="button" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
