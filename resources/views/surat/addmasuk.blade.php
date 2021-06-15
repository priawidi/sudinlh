@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Laporan Mingguan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Laporan Mingguan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">
      @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
      @endif
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                <div class="card-header">
                  <div><h4>Tambah Surat Masuk</h4></div>
                  <form method="post" action="{{url('masuk')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label for="tgl_diterima">Tanggal Diterima :</label>
                        <input type="date" class="form-control" name="tgl_diterima" placeholder="Tanggal Diterima">
                        @if ($errors->has('tgl_diterima'))
                            <span class="text-danger">{{ $errors->first('tgl_diterima') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nomor_agenda">Nomor Agenda :</label>
                        <input type="text" class="form-control" name="nomor_agenda" placeholder="Nomor Agenda">
                        @if ($errors->has('nomor_agenda'))
                            <span class="text-danger">{{ $errors->first('nomor_agenda') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="kode_klasifikasi">Kode Klasifikasi :</label>
                        <input type="text" class="form-control" name="kode_klasifikasi" placeholder="Kode Klasifikasi">
                        @if ($errors->has('kode_klasifikasi'))
                            <span class="text-danger">{{ $errors->first('kode_klasifikasi') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="pokok_surat">Pokok Surat :</label>
                        <input type="text" class="form-control" name="pokok_surat" placeholder="Pokok Surat">
                        @if ($errors->has('pokok_surat'))
                            <span class="text-danger">{{ $errors->first('pokok_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tanggal_nomor_surat">Tanggal dan Nomor Surat :</label>
                        <input type="date" class="form-control" name="tanggal_nomor_surat" placeholder="Tanggal">
                        @if ($errors->has('tanggal_nomor_surat'))
                            <span class="text-danger">{{ $errors->first('tanggal_nomor_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="asal_surat">Asal Surat :</label>
                        <input type="text" class="form-control" name="asal_surat" placeholder="asal_surat">
                        @if ($errors->has('asal_surat'))
                            <span class="text-danger">{{ $errors->first('asal_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="ditujukan">Ditujukan :</label>
                        <input type="text" class="form-control" name="ditujukan" placeholder="Ditujukan">
                        @if ($errors->has('ditujukan'))
                            <span class="text-danger">{{ $errors->first('ditujukan') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan :</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                        @if ($errors->has('keterangan'))
                            <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                        @endif
                      </div>

                      <!--
                      <div class="form-group">
                        <form action="/files" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <label>Dokumen : (.pdf)</label>
                            <input type="file" name="dokumen"  accept=".pdf" class="form-control">
                        @if ($errors->has('dokumen'))
                            <span class="text-danger">{{ $errors->first('dokumen') }}</span>
                        @endif
                      </div>
                    -->
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('masuk') }}" type="submit" class="btn btn-danger mb-1">Batal</a>
                      <button type="submit" class="btn btn-primary mb-1 float-right">Tambah</button>
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
  
  </script>
@endsection