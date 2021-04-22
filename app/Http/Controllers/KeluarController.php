<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluar;
use Hash;
use Validator;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_keluar = Keluar::all();
        return view ('surat.suratkeluar',compact('surat_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('surat.addkeluar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $surat_keluar = new Keluar;
        $surat_keluar->nomor_agenda = ucwords(strtolower($request->nomor_agenda));
        $surat_keluar->tgl_masuk = ucwords(strtolower($request->tgl_masuk));
        $surat_keluar->untuk = ucwords(strtolower($request->untuk));
        $surat_keluar->nomor_surat = ucwords(strtolower($request->nomor_surat));
        $surat_keluar->tgl_surat = ucwords(strtolower($request->tgl_surat));
        $surat_keluar->perihal_surat = ucwords(strtolower($request->perihal_surat));
        $surat_keluar->tujuan = ucwords(strtolower($request->tujuan));
        $surat_keluar->ket = ucwords(strtolower($request->ket));
        $simpan = $surat_keluar->save();
 
         return redirect('keluar');
 
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
        //$surat_keluar = 
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
        Keluar::where('id',$id)->delete();

        return redirect()->back();
    }
}