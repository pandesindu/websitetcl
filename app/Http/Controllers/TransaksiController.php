<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\UjiTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'halaman pembayaran spp';
        $transaksi = UjiTransaksi::with('siswa')->get();
        return view('transaksi.transaksiindex', compact('title', 'transaksi'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $title = 'halaman lakukan transaksi';
        return view('transaksi.transaksiinput', compact('title', 'siswa'));
    }


    // public function ambilData()
    // {
    //     $transaksi = Siswa::latest();

    //     if (request('search')) {
    //         $transaksi->where('nis', 'like', '%' . request('search') . '%');
    //     }

    //     // dd($transaksi);
    //     return view('transaksi.test', [
    //         'transaksi' => $transaksi->get(),
    //         'title' => 'input transaksi'
    //     ]);
    // }
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
            'siswa_id' => 'required',
            'semester_siswa' => 'required',
            'jumlah_pembayaran' => 'required'
        ], $message);
        $validasi['user_id'] = Auth::id();

        UjiTransaksi::create($validasi);
        return redirect('transaksi')->with('success', 'data berhasil di simpan');
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
        $transaksi = UjiTransaksi::find($id);
        $siswa = Siswa::all();
        $title = 'halaman edit transaksi';
        return view('transaksi.transaksiinput', compact('title', 'siswa', 'transaksi'));
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
            'siswa_id' => 'required',
            'semester_siswa' => 'required',
            'jumlah_pembayaran' => 'required'
        ], $message);
        $validasi['user_id'] = Auth::id();

        UjiTransaksi::where('id', $id)->update($validasi);
        return redirect('transaksi')->with('success', 'data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = UjiTransaksi::find($id);
        if ($transaksi != null) {
            $transaksi = UjiTransaksi::where('id', $id)->delete();
        }

        return redirect('transaksi')->with('success', 'data berhasil di hapus');
    }
}
