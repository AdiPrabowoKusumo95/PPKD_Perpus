<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Buku::all();
        return view('buku.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Buku::create($request->all());
        toast('Data Buku Berhasil Ditambah ','success');
        return redirect()->to('buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Buku::find($id);
        return view('buku.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Buku::where('id', $id)->update([
            'nama_buku'=>$request->nama_buku,
            'penerbit'=>$request->penerbit,
            'qty'=>$request->qty,
            'deskripsi'=>$request->deskripsi,
            'penulis'=>$request->penulis,
            'genre'=>$request->genre
        ]);
        toast('Data Buku Berhasil Diubah ','success');
        return redirect()->to('buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::where('id', $id)->delete();
        alert()->success('SuccessAlert','Data Buku Berhasil Dihapus');
        return redirect()->to('buku');
    }
}
