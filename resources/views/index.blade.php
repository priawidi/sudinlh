@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Halo </h5>
            <p class="card-text">
              Selamat Datang
            </p>
            <!-- row -->
            <div class="row">
              <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3></h3>
  
                    <p>Total Surat Masuk</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-inbox"></i>
                  </div>
                  <a href="masuk" class="nav-link " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
  
              <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3></h3>
  
                    <p>Total Surat Keluar</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-paper-plane"></i>
                  </div>
                  <a href="keluar" class="nav-link " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->

            </div>
            <!--./row -->
  
          </div>
        </div>
      </div>
    </div>
  </div>
        
    </section>
@endsection