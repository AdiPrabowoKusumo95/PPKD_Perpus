@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vertical Form</h5>

            <!-- Vertical Form -->
            <form action="{{ route('anggota.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="inputNama" class="form-label">Nama Anggota</label>
                    <input type="text" class="form-control" name="nama_anggota" id="inputNama">
                </div>
                <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="inputEmail">
                </div>
                <div class="col-12">
                    <label for="inputNoTlp" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" name="no_tlp" id="inputNoTlp">
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
