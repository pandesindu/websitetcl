<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Siswa;
use App\Models\UjiTransaksi;
use Error;
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
        $UserID = Auth()->id();
        // dd($iduser);
        $transaksi = Http::get('http://localhost:3000/transaction/user/'.$UserID);
        $res = json_decode($transaksi);
        
        
        return view('transaksi.transaksiindex', compact('res', 'title'));
    }


    public function adminIndex()
    {
        $title = 'Halaman Transaksi Siswa'; 
        // dd($iduser);
        $transaksi = Http::get('http://localhost:3000/transaction');
        $res = json_decode($transaksi);
        return view('transaksi.transaksiAdmin', compact('res', 'title'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = Auth()->id();
        $siswa = Siswa::with('kelas')->where('user_id', $userid)->get();
        $title = 'halaman lakukan transaksi';
        return view('transaksi.transaksiinput', compact('title', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $kode = random_int(10000, 99999);
        $message = [
            'required' => 'kolom harus diisi',
        ];
        $validasi = $request->validate([
            'StatusTransaksi'=>'required',
            'NamaSiswa' => 'required',
            'NisSiswa' => 'required',
            'JumlahTransaksi' => 'required',
           
        ], $message);
        $validasi['UserID'] = Auth::id();
        $validasi['KodeTransaksi'] = $kode;

        $post = Http::post('http://localhost:3000/transaction', $validasi);
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
      
        $userid = Auth()->id();
        $siswa = Siswa::with('kelas')->where('user_id', $userid)->get();
        $req = Http::get('http://localhost:3000/transaction/'.$id);
        $transaksi = json_decode($req);
        $title = 'halaman edit transaksi';
        return view('transaksi.updateTransaksi', [
            'title'=> $title,
            'transaksi' => $transaksi, 
            'siswa' => $siswa
        ]);
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
        
        $kode = random_int(10000, 99999);
        $message = [
            'required' => 'kolom harus diisi',
        ];
        $validasi = $request->validate([
            'StatusTransaksi'=>'required',
            'NamaSiswa' => 'required',
            'NisSiswa' => 'required',
            'JumlahTransaksi' => 'required',
            
        ], $message);
        $validasi['UserID'] = Auth::id();
        $validasi['KodeTransaksi'] = $kode;

        $post = Http::patch('http://localhost:3000/transaction/'.$id, $validasi);

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
       
        $post = Http::patch('http://localhost:3000/transaction/'.$id, [
            'StatusTransaksi' => 'dibatalkan'
        ]);

        return redirect('transaksi');
    }

    public function confirm($id)
    {
       dd($id);
        $post = Http::patch('http://localhost:3000/transaction/'.$id, [
            'StatusTransaksi' => 'transaksi berhasil'
        ]);
        return $post->json();

        return redirect('transaksi');
    }


}
