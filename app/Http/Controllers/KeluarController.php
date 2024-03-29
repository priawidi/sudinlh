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
        $surat_keluar->tgl_diterima = ($request->tgl_diterima);
        $surat_keluar->nomor_agenda = ($request->nomor_agenda);
        $surat_keluar->kode_klasifikasi = ($request->kode_klasifikasi);
        $surat_keluar->pokok_surat = ($request->pokok_surat);
        $surat_keluar->tanggal_nomor_surat = ($request->tanggal_nomor_surat);
        $surat_keluar->asal_surat = ($request->asal_surat);
        $surat_keluar->ditujukan = ($request->ditujukan);
        $surat_keluar->keterangan = ($request->keterangan);
    
       
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
            'tgl_diterima' => 'required',
            'nomor_agenda' => 'required',
            'kode_klasifikasi' => 'required',
            'pokok_surat' => 'required',
            'tanggal_nomor_surat' => 'required',
            'asal_surat' => 'required',
            'ditujukan' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $surat_keluar = Keluar::find($id);

        $surat_keluar->update([
            'tgl_diterima' => ($request->tgl_diterima),
            'nomor_agenda' => ($request->nomor_agenda),
            'kode_klasifikasi' => ($request->kode_klasifikasi),
            'pokok_surat' => ($request->pokok_surat),
            'tanggal_nomor_surat' => ($request->tanggal_nomor_surat),
            'asal_surat' => ($request->asal_surat),
            'ditujukan' => ($request->ditujukan),
            'keterangan' => ($request->keterangan),
        ]);

        /*
        $dokumen = $request->file('dokumen');
        if($dokumen)
        {
            $filename = $dokumen->getClientOriginalName();
            $surat_keluar['dokumen'] = $filename;
            $tujuan_upload = 'document-upload';
            $dokumen->move($tujuan_upload, $dokumen->getClientOriginalName());
            $surat_keluar->dokumen = $dokumen->getClientOriginalName();
        }
        */
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