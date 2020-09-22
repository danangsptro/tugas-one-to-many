<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DIVISI;
use App\KARYAWAN;
use Session;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DIVISI::all();
        return view('content.divisi.index-divisi',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisi = DIVISI::all();
        return view('content.divisi.create-divisi', compact('divisi'));
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
            'nama_divisi' => 'required | min:2',
        ]);

        $divisi = new DIVISI();
        $divisi->nama_divisi = $validate['nama_divisi'];
        $divisi->save();

        $request->session()->flash('validasi','DATA BERHASIL DI INPUT');
        return redirect()->route('divisi.index');
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
    public function edit(Divisi $divisi)
    {
        $edit = DIVISI::all($id);
        return view('content.divisi.edit-divisi', compact('edit'));
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
        $edit->update($validasi);
        

        if($edit){
            Session::flash('sukses','DATA BERHASIL DI UPDATE');
            return redirect()->route('divisi.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = DIVISI::find($id);
        $hapus->delete();

        if($hapus){ 
        Session::flash('sukses','SUKSES DELETE DATA');
        return redirect()->route('divisi.index');
    }
}
}
