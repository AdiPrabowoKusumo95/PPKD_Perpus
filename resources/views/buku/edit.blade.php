@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vertical Form</h5>

            <!-- Vertical Form -->
            <form action="{{ route('buku.update', $edit->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="inputNama" class="form-label">Nama Buku</label>
                    <input value="{{ $edit->nama_buku }}" type="text" class="form-control" name="nama_buku" id="inputNama">
                </div>
                <div class="col-12">
                    <label for="inputPenerbit" class="form-label">Penerbit</label>
                    <input value="{{ $edit->penerbit }}" type="text" class="form-control" name="penerbit" id="inputPenerbit">
                </div>
                <div class="col-12">
                    <label for="inputQty" class="form-label">Quantity</label>
                    <input value="{{ $edit->qty }}" type="number" class="form-control" name="qty" id="inputQty">
                </div>
                <div class="col-12">
                    <label for="inputDes" class="form-label">Deskripsi</label>
                    <input value="{{ $edit->deskripsi }}" type="text" class="form-control" name="deskripsi" id="inputDes">
                </div>
                <div class="col-12">
                    <label for="inputPenulis" class="form-label">Penulis</label>
                    <input value="{{ $edit->penulis }}" type="text" class="form-control" name="penulis" id="inputPenulis">
                </div>
                <div class="col-12">
                    <label for="inputGenre" class="form-label">Genre</label>
                    <input value="{{ $edit->genre }}" type="text" class="form-control" name="genre" id="inputGenre">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url()->previous() }}" type="" class="btn btn-danger">Kembali</a>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
@endsection
