@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vertical Form</h5>

            <!-- Vertical Form -->
            <form action="{{ route('level.update', $edit->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="inputName" class="form-label">Nama Level</label>
                    <input value="{{ $edit->nama_level }}" type="text" class="form-control" name="nama_level" id="inputName">
                </div>
                <div class="col-12">
                    <label for="inputKet" class="form-label">Keterangan</label>
                    <input value="{{ $edit->keterangan }}" type="text" class="form-control" name="keterangan" id="inputKet">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url()->previous() }}" type="" class="btn btn-danger">Kembali</a>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
@endsection
