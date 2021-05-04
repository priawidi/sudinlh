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
        $surat_keluar->nomor_agenda = ($request->nomor_agenda);
        $surat_keluar->tgl_masuk = ($request->tgl_masuk);
        $surat_keluar->untuk = ($request->untuk);
        $surat_keluar->nomor_surat = ($request->nomor_surat);
        $surat_keluar->tgl_surat = ($request->tgl_surat);
        $surat_keluar->perihal_surat = ($request->perihal_surat);
        $surat_keluar->tujuan = ($request->tujuan);
        $surat_keluar->ket = ($request->ket);
        $surat_keluar->dokumen = ($request->dokumen);

        $rules = array(
            'dokumen' => 'required|mimes:pdf'
            );

        $dokumen = $request->file('dokumen');
        $tujuan_upload = 'document-upload';
        $dokumen->move($tujuan_upload, $dokumen->getClientOriginalName());
        $surat_keluar->dokumen = $dokumen->getClientOriginalName();
       
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


    public function download($dokumen)
    {
        return response()->download('document-upload/'.$dokumen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat_keluar = Keluar::find($id);
        return view('surat.editkeluar',compact('surat_keluar'));
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
        $validator = Validator::make($request->all(), [
            'nomor_agenda' => 'required',
            'tgl_masuk' => 'required',
            'dari' => 'required',
            'nomor_surat' => 'required',
            'tgl_surat' => 'required',
            'perihal_surat' => 'required',
            'tujuan' => 'required',
            'ket' => 'required',
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $surat_keluar = Keluar::find($id);

        $surat_keluar->update([
        'nomor_agenda' => ($request->nomor_agenda),
        'tgl_masuk' => ($request->tgl_masuk),
        'untuk' => ($request->untuk),
        'nomor_surat' => ($request->nomor_surat),
        'tgl_surat' => ($request->tgl_surat),
        'perihal_surat' => ($request->perihal_surat),
        'tujuan' => ($request->tujuan),
        'ket' => ($request->ket),
        ]);

        $dokumen = $request->file('dokumen');
        if($dokumen)
        {
            $filename = $dokumen->getClientOriginalName();
            $surat_keluar['dokumen'] = $filename;
            $tujuan_upload = 'document-upload';
            $dokumen->move($tujuan_upload, $dokumen->getClientOriginalName());
            $surat_keluar->dokumen = $dokumen->getClientOriginalName();
        }
        
            if ($surat_keluar->save()) {
                return redirect('keluar')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect('keluar')->with('error', 'error message');
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
        Keluar::where('id',$id)->delete();

        return redirect()->back();
    }
}