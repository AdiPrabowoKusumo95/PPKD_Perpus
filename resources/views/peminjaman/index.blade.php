@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Peminjaman</h5>
                    <!-- Table with stripped rows -->
                    <a href="{{ route('tambah-peminjaman') }}" type="button" class="btn btn-outline-primary">Tambah</a>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Nama Anggota</th>
                                <th>Aksi</th>
                                
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->no_transaksi }}</td>
                                    <td>{{ $data->anggota->nama_anggota }}</td>
                                    <td>
                                        <a href="{{ route('show-peminjaman', $data->id) }}" type="button" class="btn btn-outline-primary">Detail</a>

                                        <form action="{{ route('delete-peminjaman', $data->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-outline-primary">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>

        </div>
    </div>
@endsection
