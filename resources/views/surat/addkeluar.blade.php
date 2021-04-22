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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                  <div><h4>Tambah Surat</h4></div>
                  <form method="post" action="{{url('keluar')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nomor_agenda">Nomor Agenda :</label>
                        <input type="text" class="form-control" name="nomor_agenda" placeholder="Nomor Agenda">
                        @if ($errors->has('nomor_agenda'))
                            <span class="text-danger">{{ $errors->first('nomor_agenda') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk :</label>
                        <input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal">
                        @if ($errors->has('tgk_masuk'))
                            <span class="text-danger">{{ $errors->first('tgl_masuk') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="untuk">Untuk :</label>
                        <input type="text" class="form-control" name="untuk" placeholder="Untuk">
                        @if ($errors->has('untuk'))
                            <span class="text-danger">{{ $errors->first('untuk') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nomor_surat">No. Surat :</label>
                        <input type="text" class="form-control" name="nomor_surat" placeholder="No. Surat">
                        @if ($errors->has('nomor_surat'))
                            <span class="text-danger">{{ $errors->first('nomor_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tgl_surat">Tanggal Surat :</label>
                        <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Surat">
                        @if ($errors->has('tgl_surat'))
                            <span class="text-danger">{{ $errors->first('tgl_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="perihal_surat">Perihal Surat :</label>
                        <input type="text" class="form-control" name="perihal_surat" placeholder="Perihal Surat">
                        @if ($errors->has('perihal_surat'))
                            <span class="text-danger">{{ $errors->first('perihal_surat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tujuan">Tujuan :</label>
                        <input type="text" class="form-control" name="tujuan" placeholder="Tujuan">
                        @if ($errors->has('tujuan'))
                            <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="ket">Keterangan :</label>
                        <input type="text" class="form-control" name="ket" placeholder="Keterangan">
                        @if ($errors->has('ket'))
                            <span class="text-danger">{{ $errors->first('ket') }}</span>
                        @endif
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('keluar') }}" type="submit" class="btn btn-danger mb-1">Batal</a>
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