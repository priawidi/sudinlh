@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>&nbsp;Surat Keluar</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">
        <!-- @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif -->
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                @if (!empty($surat_keluar))
            
                <div class="card-body">
                    <div><h6>Filter</h6><span><a href="/keluar/create" class="btn btn-info float-right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Upload Surat</a></span></div>
                    <div id="filter-user" class="btn-group" role="group"></div><br><br>
                    <table id="suratkeluar-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No Urut</th>
                                <th>Tanggal Diterima</th>
                                <th>Nomor Agenda</th>
                                <th>Kode Klasifikasi</th>
                                <th>Pokok Surat</th>
                                <th>Tanggal Dan Nomor Surat</th>
                                <th>Asal Surat</th>
                                <th>Ditujukan/Dikirim</th>
                                <th>Keterangan</th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach($surat_keluar as $keluar)
                            <tr>
                                <td>{{ $keluar->id }}</td>
                                <td>{{ $keluar->tgl_diterima }}</td>
                                <td>{{ $keluar->nomor_agenda }}</td>
                                <td>{{ $keluar->kode_klasifikasi }}</td>
                                <td>{{ $keluar->pokok_surat }}</td>
                                <td>{{ $keluar->tanggal_nomor_surat }}</td>
                                <td>{{ $keluar->asal_surat }}</td>
                                <td>{{ $keluar->ditujukan }}</td>
                                <td>{{ $keluar->keterangan }}</td>
                                <td><center>
                                <a href="{{action('KeluarController@edit', $keluar['id'])}}" class="btn btn-warning mb-1" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i></a>
                                <a href="" onclick="if(confirm('Do you want to delete this letter?'))event.preventDefault(); document.getElementById('delete-{{$keluar->id}}').submit();" class="btn btn-danger mb-1" data-toggle="tooltip" data-placement="bottom" title="Hapus Surat">
                                    <form action="{{ route('keluar-delete',$keluar->id) }}" id="delete-{{ $keluar->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    </form>
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Tidak Ada Surat Keluar</p>
                    @endif
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
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Data yang sudah dihapus tidak dapat dikembalikan lagi!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Deleted!',
                'Data Berhasil Di Hapus',
                'success'
                );
                $(`#delete${id}`).submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                'Cancelled',
                'Data Batal Di Hapus',
                'error'
                )
            }
        });
    });
    

    $(document).ready(function() {
    $('#suratkeluar-table').DataTable({
    "ordering": true,
    "lengthMenu": [
        [10,25,50,-1],
        [10,25,50, "All"]
    ],
    initComplete: function() {
      
        this.api().columns(6).every(function() {
            var column = this;
            var select = $('<select class="form-control"><option value="" selected="true">--Asal Surat--</option></select>')
            .appendTo($('#filter-user'))
            .on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                column
                    .search(val ? '^' + val + '$' : '', true,false)
                    .draw();
            });

            column.data().unique().sort().each(function(d, j) {
                select.append('<option value="' + d + '">' + d + '</option')
            });
        });
    },

    

    
});

    $('#suratkeluar').DataTable({
        "lengthMenu": [
           [10,25,50,-1],
        [10,25,50, "All" ]
        ],
        "responsive": true,
        "autowidth":false,
        "ordering":false,
        "info": true,
        "paging": true,
        "lengthChange": false,
    });
});



$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
        </script>
@endsection

