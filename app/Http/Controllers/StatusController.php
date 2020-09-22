<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\STATUS;
use App\KARYAWAN;
use Session;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = STATUS::all();
        return view('content.status.index-status', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = STATUS::all();
        return view ('content.status.create-status',compact('status'));
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
            'status_karyawan' => 'required | min:3',
        ]);

        $status = new STATUS();
        $status->status_karyawan = $validate['status_karyawan'];
        $status->save();

        $request->session()->flash('validasi','DATA BERHASIL DI INPUT');
        return redirect()->route('status.index');
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
        $edit = STATUS::find($id);
        return view ('content.status.edit-status');
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
        $hapus = STATUS::find($id);
        $hapus->delete();

        if($hapus){ 
        Session::flash('sukses','SUKSES DELETE DATA');
        return redirect()->route('status.index');
    }
}
}