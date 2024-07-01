@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vertical Form</h5>

            <!-- Vertical Form -->
            <form action="{{ route('user.update', $edit->id) }}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="inputNama" class="form-label">Nama Pengguna</label>
                    <input value="{{ $edit->nama }}" type="text" class="form-control" name="nama" id="inputNama">
                </div>
                <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input value="{{ $edit->email }}" type="text" class="form-control" name="email" id="inputEmail">
                </div>
                <div class="col-12">
                    <label for="inputLevel" class="form-label ">Level</label>
                    <select id="inputLevel" name="id_level" class="form-control">
                        <option disabled selected hidden>--Pilih Level--</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}" {{ $level->id == $edit->level_id ? 'selected' : '' }}>
                                {{ $level->nama_level }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url()->previous() }}" type="" class="btn btn-danger">Kembali</a>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
@endsection
