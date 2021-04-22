@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manajemen User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manajemen User</li>
              </ol>
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
                  <div><h4>Tambah User Baru</h4></div>
                  <form method="post" action="{{url('manjuser')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      
                        <div class="form-group">
                          <label for="username">Username :</label>
                          <input type="text" class="form-control" name="username" placeholder="Username">
                          @if ($errors->has('username'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                      
                      <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('manjuser') }}" type="submit" class="btn btn-danger mb-1">Batal</a>
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

