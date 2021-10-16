<?php

namespace App\Http\Controllers;

use App\Models\DetailSiswa;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        $title = 'Halaman siswa';
        return view('siswa.SiswaIndex', compact('siswa', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $title = 'Tambah Data siswa';
        return view('siswa.inputsiswa', compact('kelas', 'title'));
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
            'nis' => 'required|unique:siswas',
            'nama_siswa' => 'required|max:255',
            'kelas_id' => 'required|max:255'
        ], $message);

        $validasi1 = $request->validate([
            'nis' => 'required|unique:detail_siswas',
            'jk_siswa' => 'required',
            'alamat_siswa' => 'required',
            'ttl_siswa' => 'required',
            'no_hp' => 'required'
        ], $message);

        DB::beginTransaction();
        Siswa::create($validasi);
        DetailSiswa::create($validasi1);
        DB::commit();
        return redirect('siswa')->with('success', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // DB::beginTransaction();
        $siswa = Siswa::find($id);
        dd($siswa);
        // $siswa1 = DetailSiswa::find($id);
        // DB::commit();
        // $kelas = Kelas::all();
        // $title = 'edit Data siswa';
        return view('siswa.inputsiswa', compact('siswa'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
