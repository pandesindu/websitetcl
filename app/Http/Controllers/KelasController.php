<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Datar kelas';
        $kelas=Kelas::all();

        return view('kelas.BerandaKelas', compact('title', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='input kelas';
        return view('kelas.InputKelas', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=>'kolom harus diisi',
        ];
        $validasi= $request->validate([
            'kd_kelas'=>'required|unique:kelas',
            'nama_kelas'=>'required|max:255'
        ], $message);
        Kelas::create($validasi);
        return redirect('kelas')->with('success', 'data berhasil di simpan');
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
        $kelas=Kelas::find($id);
        $title='edit kelas';
        return view('kelas.InputKelas', compact('title', 'kelas'));
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
        $message=[
            'required'=>'kolom harus diisi',
        ];
        $validasi= $request->validate([
            'kd_kelas'=>'required',
            'nama_kelas'=>'required|max:255'
        ], $message);
        Kelas::where('id', $id)->update($validasi);
        return redirect('kelas')->with('success', 'data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas=Kelas::find($id);
        if($kelas != null){
            $kelas=Kelas::where('id', $id)->delete();
        }

        return redirect('kelas')->with('success', 'data berhasil di hapus');
    }

}
