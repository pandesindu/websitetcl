<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailSiswa;
use App\Models\Siswa;
use App\Models\UjiTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class apiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return response()->json($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'siswa_id' => 'required',
            'semester_siswa' => 'required',
            'jumlah_pembayaran' => 'required', 

        ], $message);
        // $validasi['user_id'] = Auth::id();

        try {
            $response = UjiTransaksi::create($validasi);
            return response()->json([
                'success'=> true,
                'message'=>'success',
                'data'=>$response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=> 'error',
                'error'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //show digunakan  untuk get data by nis 
    public function show($id)
    {
        $data = Siswa::where('nis', $id)->get();
        return response()->json($data, $status = 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
