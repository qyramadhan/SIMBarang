@extends('layouts.app')

@section('title','Inventory - Management Barang')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Barang</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Management Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Barang</li>
                    </ol>
                </div>
                <div class="ms-auto pageheader-btn">
                    @can('role-create')
                    <a href="{{ url('barang/create') }}" class="btn btn-secondary btn-icon text-white btn-sm">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span> Tambah Data
                    </a>
                    <a href="{{ url('barang/cetak') }}" target="_blank" class="btn btn-success btn-icon text-white btn-sm">
                        <span>
                            <i class="fa fa-print"></i>
                        </span> Cetak Data
                    </a>
                    @endcan
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="col-md-12 col-md-offset-12 mb-3 alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @elseif ($message = Session::get('failed'))
            <div class="mb-3 alert alert-warning">
                <p>{{ $message }}</p>
            </div>
            @endif
            
        </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Barang</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">No</th>
                                            <th class="wd-15p">Nama Barang</th>
                                            <th class="wd-15p">Tanggal Pembelian</th>
                                            <th class="wd-15p">Kategori</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->nama_barang }}</td>
                                            <td>{{ $value->tgl_pembelian->translatedFormat('d-m-Y')}} </td>
                                            <td>{{ $value->nama_kategori }}</td>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ url('barang/edit',$value->id_barang) }}"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $value->id_barang }}"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- TABLE WRAPPER -->
                    </div>
                    <!-- SECTION WRAPPER -->
                </div>
            </div>
            <!-- ROW-1 CLOSED -->

        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ url('barang/delete') }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin untuk menghapus data?.</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_barang" id="id_barang_delete">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    @csrf
                </div>
            </div>
        </form>
    </div>
</div>




@endsection

@section('js')
<!-- INTERNAL  DATA TABLE JS-->
<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="../assets/plugins/datatable/js/jszip.min.js"></script>
<script src="../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="../assets/plugins/datatable/datatable.js"></script>

<script>
    $('#exampleModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $("#id_barang_delete").val(id);
    });

</script>
@endsection