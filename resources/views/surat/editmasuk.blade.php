@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>&nbsp;Surat Masuk</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">
  
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
            
                <div class="card-header">
                  <div><h4>Edit Surat Masuk</h4></div>
                  <form method="post" action="{{route('masuk.update', $surat_masuk->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nomor_agenda">Nomor Agenda :</label>
                        <input type="text" id="nomor_agenda"class="form-control" name="nomor_agenda" value="{{$surat_masuk->nomor_agenda}}">
                        @if ($errors->has('nomor_agenda'))
                            <span class="text-danger">{{ $errors->first('nomor_agenda') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk :</label>
                            <input type="date" id="tgl_masuk"class="form-control" name="tgl_masuk" 
                            value="{{$surat_masuk->tgl_masuk}}">
                         @if ($errors->has('tgl_masuk'))
                            <span class="text-danger">{{ $errors->first('tgl_masuk') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="dari">Dari :</label>
                        <input type="text" id="dari"class="form-control" name="dari" value="{{$surat_masuk->dari}}">
                        @if ($errors->has('dari'))
                            <span class="text-danger">{{ $errors->first('dari') }}</span>
                        @endif
                      </div>  
                      <div class="form-group">
                        <label for="nomor_surat">Nomor Surat : </label>
                            <input type="text" id="nomor_surat"class="form-control" name="nomor_surat" value="{{$surat_masuk->nomor_surat}}">
                      @if ($errors->has('nomor_surat'))
                            <span class="text-danger">{{ $errors->first('nomor_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tgl_surat">Tanggal Surat : </label>
                        <input type="date" id="tgl_surat" class="form-control" name="tgl_surat" value="{{ $surat_masuk->tgl_surat }}">
                      @if ($errors->has('tgl_surat'))
                            <span class="text-danger">{{ $errors->first('tgl_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="perihal_surat">Perihal Surat : </label>
                            <input type="text" id="perihal_surat"class="form-control" name="perihal_surat" value="{{$surat_masuk->perihal_surat}}">
                      @if ($errors->has('perihal_surat'))
                            <span class="text-danger">{{ $errors->first('perihal_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tujuan">Tujuan : </label>
                            <input type="text" id="tujuan"class="form-control" name="tujuan" value="{{$surat_masuk->tujuan}}">
                      @if ($errors->has('tujuan'))
                            <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="ket">Keterangan : </label>
                            <input type="text" id="ket"class="form-control" name="ket" value="{{$surat_masuk->ket}}">
                      @if ($errors->has('ket'))
                            <span class="text-danger">{{ $errors->first('ket') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <form action="/files" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <label for="dokumen">Dokumen Awal : ({{$surat_masuk->dokumen}})</label>
                            <input type="file" id="dokumen" name="dokumen"  accept=".pdf" class="form-control" value="{{$surat_masuk->dokumen}}">             
                        @if ($errors->has('dokumen'))
                            <span class="text-danger">{{ $errors->first('dokumen') }}</span>
                        @endif
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('masuk') }}" type="submit" class="btn btn-secondary mb-1">Batal</a>
                      <button type="submit" class="btn btn-primary mb-1">Ubah</button>
                    </div>
                  </form>
                </div>
            </div>
            </div>
        </div>

      
    </section>
@endsection

@section('footer')
  <!-- page script -->
  <script>

    $(".swal-confirm").click(function(e) {
    id = e.target.dataset.id;
    Swal.fire(
      'Good job!',
      'Data Berhasil Diubah!',
      'success'
    );
  });
  
  </script>
@endsection
