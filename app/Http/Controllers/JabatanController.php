<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JABATAN;
use App\KARYAWAN;
use Session;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JABATAN::all();
        return view('content.jabatan.index-jabatan',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = JABATAN::all();
        return view('content.jabatan.create-jabatan', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'jabatan_karyawan' => 'required| min:2',
        ]);

        $jabatan = new JABATAN();
        $jabatan->jabatan_karyawan = $validate['jabatan_karyawan'];
        $jabatan->save();

        $request->session()->flash('sukses','DATA BERHASIL DI INPUT');
        return redirect()->route('jabatan.index');
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
        $hapus = JABATAN::find($id);
        $hapus->delete();

        if($hapus){
            Session::flash('sukses','SUKSES DELETE DATA');
            return redirect()->route('jabatan.index');
        }
    }
}
