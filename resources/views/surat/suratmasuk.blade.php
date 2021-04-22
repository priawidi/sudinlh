@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>&nbsp;Surat Masuk</h1>
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
                @if (!empty($surat_masuk))
            
                <div class="card-body">
                    <div><h6>Filter</h6>
                        <span><a href="/masuk/create" class="btn btn-info float-right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Upload Surat</a></span></div>
                    <div id="filter-user" class="btn-group" role="group"></div><br><br>
                    <table id="suratmasuk-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Agenda</th>
                                <th>Tanggal Masuk</th>
                                <th>Dari</th>
                                <th>No. Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal Surat</th>
                                <th>Disampaikan Kepada</th>
                                <th>Keterangan</th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach($surat_masuk as $masuk)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $masuk->nomor_agenda }}</td>
                                <td>{{ $masuk->tgl_masuk }}</td>
                                <td>{{ $masuk->dari }}</td>
                                <td>{{ $masuk->nomor_surat }}</td>
                                <td>{{ $masuk->tgl_surat }}</td>
                                <td>{{ $masuk->perihal_surat }}</td>
                                <td>{{ $masuk->tujuan }}</td>
                                <td>{{ $masuk->ket }}</td>
                                <td><center>
                                <a href="{{action('MasukController@edit', $masuk['id'])}}" class="btn btn-warning mb-1" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger mb-1 swal-confirm" data-id="{{ $masuk->id}}" data-toggle="tooltip" data-placement="bottom" title="Hapus Data">
                                <form action="{{ route('masuk-delete' ,$masuk->id) }}" id="delete{{ $masuk->id }}" method="POST">
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
                        <p>Tidak Ada Surat Masuk</p>
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
    $('#suratmasuk-table').DataTable({
    "ordering": true,
    "lengthMenu": [
        [10,25,50,-1],
        [10,25,50, "All"]
    ],
    initComplete: function() {
        this.api().columns(1).every(function() {
            var column = this;
            var select = $('<select class="form-control"><option value="" selected="true">--All--</option></select>')
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

    $('#user').DataTable({
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
