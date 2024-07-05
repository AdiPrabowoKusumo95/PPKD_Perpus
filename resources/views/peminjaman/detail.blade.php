@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detail Peminjaman</title>
        <style>
            #printtable {
                text-align: left;
                margin: 0 auto;
                width: 20% min-width:fit-content;
            }

            ul {
                list-style-type: none;
                padding: 0;
            }

            @media print {
                body * {
                    visibility: hidden;
                }

                #printtable,
                #printtable * {
                    visibility: visible;
                }

                #printtable {
                    position: absolute;
                    left: 0;
                    top: 0;
                }
            }
        </style>
    </head>

    <body>
        <div id="printtable" align="center">

            <h1>Detail Peminjaman</h1>
            <p>Id Peminjaman : {{ $detailbuku->first()->id_peminjam }}</p>
            <p>Nama Peminjam : {{ $detailbuku->first()->anggota->nama_anggota }}</p>
            Nama Buku : <br>
            <ol>
                @foreach ($detailbuku as $detail)
                    <li>{{ $detail->buku->nama_buku }}</li>
                @endforeach
            </ol>
            <p>Tanggal Pinjam : {{ $detailbuku->first()->tanggal_pinjam }}</p>
            <p>Tanggal Kembali : {{ $detailbuku->first()->tanggal_pengembalian }}</p>
            <p>Status : {{ $detailbuku->first()->keterangan }}</p>

            <a href="{{ route('peminjaman') }}">Kembali</a> <button onclick="printDiv('printtable')">Print</button>
        </div>
        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
        <style>
            @media print {
                body * {
                    visibility: hidden;
                }

                #printtable,
                #printtable * {
                    visibility: visible;
                }

                #printtable {
                    position: absolute;
                    left: 0;
                    top: 0;
                }
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        </div>
    </body>

    </html>
@endsection
