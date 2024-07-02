@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vertical Form</h5>

            <!-- Vertical Form -->
            <form action="{{ route('buku.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="inputNamaBuku" class="form-label">Nama Buku</label>
                    <input type="text" class="form-control" name="nama_buku" id="inputNamaBuku">
                </div>
                <div class="col-12">
                    <label for="inputPenerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="inputPenerbit">
                </div>
                <div class="col-12">
                    <label for="inputQty" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="qty" id="inputQty">
                </div>
                <div class="col-12">
                    <label for="inputDes" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="inputDes">
                </div>
                <div class="col-12">
                    <label for="inputPenulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" id="inputPenulis">
                </div>
                <div class="col-12">
                    <label for="inputGenre" class="form-label">Genre</label>
                    <input type="text" class="form-control" name="genre" id="inputGenre">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="{{ url()->previous() }}" type="" class="btn btn-danger">Kembali</a>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
@endsection
