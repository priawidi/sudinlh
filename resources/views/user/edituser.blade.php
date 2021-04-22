@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>&nbsp;Manajemen User</h1>
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
                  <div><h4>Edit User</h4></div>
                  <form method="post" action="{{route('manjuser.update', $users_list->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama User" value="{{$users_list->name}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="username">Username :</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{$users_list->username}}">
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{$users_list->email}}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('manjuser') }}" type="submit" class="btn btn-secondary mb-1">Batal</a>
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

   
  
  </script>
@endsection

