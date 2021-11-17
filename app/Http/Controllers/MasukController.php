<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masuk;
use Hash;
use Validator;
use PDF;
use DB;

class MasukController extends Controller
{
  
    public function index()
    {
        $surat_masuk = Masuk::all();
        return view ('surat.suratmasuk',compact('surat_masuk'));
    }


    public function create()
    {
        return view ('surat.addmasuk');
    }


    public function store(Request $request)
    {
        $surat_masuk = new Masuk;
        $surat_masuk->tgl_diterima = ($request->tgl_diterima);
        $surat_masuk->nomor_agenda = ($request->nomor_agenda);
        $surat_masuk->kode_klasifikasi = ($request->kode_klasifikasi);
        $surat_masuk->pokok_surat = ($request->pokok_surat);
        $surat_masuk->tanggal_nomor_surat = ($request->tanggal_nomor_surat);
        $surat_masuk->asal_surat = ($request->asal_surat);
        $surat_masuk->ditujukan = ($request->ditujukan);
        $surat_masuk->keterangan = ($request->keterangan);

        $simpan = $surat_masuk->save();
 
         return redirect('masuk');
 
     }

   
    public function show($id)
    {
        //return view('surat_masuk.show',compact('surat_masuk'));
    }


    // public function download($dokumen)
    // {
    //     return response()->download('document-upload/'.$dokumen);
    // }
  
    public function edit($id)
    {
        $surat_masuk = Masuk::find($id);
        return view('surat.editmasuk',compact('surat_masuk'));
    }


    

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

        $surat_masuk = Masuk::find($id);

        $surat_masuk->update([
        'tgl_diterima' => ($request->tgl_diterima),
        'nomor_agenda' => ($request->nomor_agenda),
        'kode_klasifikasi' => ($request->kode_klasifikasi),
        'pokok_surat' => ($request->pokok_surat),
        'tanggal_nomor_surat' => ($request->tanggal_nomor_surat),
        'asal_surat' => ($request->asal_surat),
        'ditujukan' => ($request->ditujukan),
        'keterangan' => ($request->keterangan),
        ]);

        $dokumen = $request->file('dokumen');
        if($dokumen)
        {
            $filename = $dokumen->getClientOriginalName();
            $surat_masuk['dokumen'] = $filename;
            $tujuan_upload = 'document-upload';
            $dokumen->move($tujuan_upload, $dokumen->getClientOriginalName());
            $surat_masuk->dokumen = $dokumen->getClientOriginalName();
        }
        
            if ($surat_masuk->save()) {
                return redirect('masuk')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect('masuk')->with('error', 'error message');
            }
    
    }

    public function destroy($id)
    {
        Masuk::where('id',$id)->delete();

        return redirect()->back();
    }
}
