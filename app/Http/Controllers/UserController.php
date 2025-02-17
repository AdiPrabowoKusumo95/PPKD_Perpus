<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Level;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DB::table('user')
        ->join('level', 'user.id_level', '=', 'level.id')
        ->select('user.*', 'level.nama_level')->get();


        return view('user.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::get();
        return view('user.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->all());
        toast('Data Pengguna Berhasil Ditambah ','success');
        return redirect()->to('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('level')->findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = User::findOrFail($id);
        $levels = Level::all();
        return view('user.edit', compact('edit', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $edit = User::find($id);
        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $edit->password;
        }

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'id_level' =>$request->id_level,
            'email' => $request->email,
            'password' => $password,
        ]);
        toast('Data Pengguna Berhasil Diubah ','success');
        return redirect()->to('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        alert()->success('SuccessAlert','Data Pengguna Berhasil Dihapus');
        return redirect()->to('user');
    }
}
