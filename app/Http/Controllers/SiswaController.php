<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function siswaGuru()
    {
        $siswa = Siswa::all();
        return view('siswag.index', compact('siswa'));
    }

    public function siswaSiswa()
    {
        $siswa = Siswa::all();
        return view('siswas.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('siswa.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jk' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = new siswa;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->jk = $request->jk;
        $siswa->jurusan = $request->jurusan;
        $siswa->alamat = $request->alamat;

        $siswa->save();
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jk' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = siswa::findOrFail($id);
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->jk = $request->jk;
        $siswa->jurusan = $request->jurusan;
        $siswa->alamat = $request->alamat;
        $siswa->save();
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}
