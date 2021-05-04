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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_masuk = Masuk::all();
        return view ('surat.suratmasuk',compact('surat_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('surat.addmasuk');
    }

    public function preview()
    {
        $data = ['title' => 'Laravel 7 Generate PDF From View Example Tutorial'];
        $pdf = PDF::loadView('pdf', $data);
  
        return $pdf->download('sudin.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $surat_masuk = new Masuk;
        $surat_masuk->nomor_agenda = ($request->nomor_agenda);
        $surat_masuk->tgl_masuk = ($request->tgl_masuk);
        $surat_masuk->dari = ($request->dari);
        $surat_masuk->nomor_surat = ($request->nomor_surat);
        $surat_masuk->tgl_surat = ($request->tgl_surat);
        $surat_masuk->perihal_surat = ($request->perihal_surat);
        $surat_masuk->tujuan = ($request->tujuan);
        $surat_masuk->ket = ($request->ket);
        $surat_masuk->dokumen = ($request->dokumen);

        $rules = array(
            'dokumen' => 'required|mimes:pdf'
            );

        $dokumen = $request->file('dokumen');
        $tujuan_upload = 'document-upload';
        $dokumen->move($tujuan_upload, $dokumen->getClientOriginalName());
        $surat_masuk->dokumen = $dokumen->getClientOriginalName();

        $simpan = $surat_masuk->save();
 
         return redirect('masuk');
 
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('surat_masuk.show',compact('surat_masuk'));
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
        $surat_masuk = Masuk::find($id);
        return view('surat.editmasuk',compact('surat_masuk'));
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

        $surat_masuk = Masuk::find($id);

        $surat_masuk->update([
        'nomor_agenda' => ($request->nomor_agenda),
        'tgl_masuk' => ($request->tgl_masuk),
        'dari' => ($request->dari),
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Masuk::where('id',$id)->delete();

        return redirect()->back();
    }
}
