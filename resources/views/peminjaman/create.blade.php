@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vertical Form</h5>

            <!-- Vertical Form -->
            <form action="{{ route('aksitambah-peminjaman') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="inputNama" class="form-label">Nama Peminjam</label>
                    <select  class="form-control"  name="id_anggota" id="inputNama" required>
                        <option value="">Pilih Anggota</option>
                        @foreach ($peminjams as $peminjam)
                            <option value="{{ $peminjam->id }}">{{ $peminjam->nama_anggota }}</option>
                        @endforeach
                    </select>
                    <a href="{{ route('anggota.create') }}" type="button" class="btn btn-success btn-sm">Anggota Baru</a>
                </div>
                <div class="mb-3">
                    <label for="no_transaksi">No Transaksi</label>
                    <input type="text" readonly name="no_transaksi" id="no_transaksi" value="{{ $kode_transaksi }}" class="form-control">
                </div>
                <br><br>
                <div class="table-transaction">
                    <div class="mb-3" align="right">
                        <button type="button" class="btn btn-success btn-sm btn-add">Tambah</button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>
                                    <select name="id_buku" id="">
                                        <option value="">Pilih Buku</option>
                                        @foreach ($bukus as $buku)
                                            <option value="{{ $buku->id }}">{{ $buku->nama_buku }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="date" name="tanggal_pinjam" class="form-control">
                                </td>
                                <td>
                                    <input type="date" name="tanggal_pengembalian" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="keterangan" class="form-control">
                                </td>
                                <td>
                                    Hapus
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
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
