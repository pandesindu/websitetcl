<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'daftar jurusan';
        $jurusan = Jurusan::all();
        return view('jurusan.jurusanindex', compact('title', 'jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'input jurusan';
        return view('jurusan.inputjurusan', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'kolom harus diisi',
        ];
        $validasi = $request->validate([
            'kode_jurusan' => 'required|unique:jurusans',
            'nama_jurusan' => 'required|max:255',
        ], $message);
        Jurusan::create($validasi);
        return redirect('jurusan')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'input jurusan';
        $jurusan = Jurusan::find($id);
        return view('jurusan.inputjurusan', compact('title', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'kolom harus diisi',
        ];
        $validasi = $request->validate([
            'kode_jurusan' => 'required|unique:jurusans',
            'nama_jurusan' => 'required|max:255',
        ], $message);
        Jurusan::where('id', $id)->update($validasi);
        return redirect('jurusan')->with('success', 'data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        if ($jurusan != null) {
            $jurusan = Jurusan::where('id', $id)->delete();
        }

        return redirect('jurusan')->with('success', 'data data terhapus');
    }
}
