<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DIVISI;
use App\JABATAN;
use App\STATUS;
use App\KARYAWAN;
// use App\hobiMany;
use Session;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KARYAWAN::all();
        return view('content.karyawan.index-karyawan',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisi = DIVISI::all();
        $jabatan = JABATAN::all();
        $status = STATUS::all();
        // $daftar_hobi = hobiMany::all();
        return view ('content.karyawan.create-karyawan', compact('divisi','jabatan','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Authorize
        // $this->authorize('create', KARYAWAN::class);

        $validate = $request->validate([
            'nama_karyawan' => 'required | min:2',
            'alamat_karyawan' => 'required',
            'nomor_telepon' => 'required|min:10',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
            'status_id' => 'required',
        ]);
        $karyawan = KARYAWAN::create($validate);
        $karyawan->save();
        // $karyawan->hobi()->attach($request->hobi);

        return redirect()->route('karyawan.index');
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
    public function edit(KARYAWAN $karyawan)
    {
        $karyawan->find($karyawan->id)->all();
        $divisi = DIVISI::all();
        $jabatan = JABATAN::all();
        $status = STATUS::all();
        // $hobi = hobiMany::all();
        return view('content.karyawan.edit-karyawan', compact('divisi','jabatan','status','karyawan'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KARYAWAN $karyawan)
    {
        $validate = $request->validate([
            'nama_karyawan' => 'required | min:2',
            'alamat_karyawan' => 'required',
            'nomor_telepon' => 'required|min:10',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
            'status_id' => 'required',
        ]);
        $karyawan->update($validate);
        // $karyawan->hobi()->sync($request->hobi);
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $hapus = KARYAWAN::find($id);
     $hapus->delete();

     if($hapus){
         Session::flash('sukses', 'SUKSES DELETE DATA');
         return redirect()->route('karyawan.index');
     }
    }
}
