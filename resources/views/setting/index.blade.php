@extends('layouts.app')

@section('title','Inventory - Pengaturan')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Pengaturan</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/setting') }}">Management Pengaturan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
                    </ol>
                </div>
                <div class="ms-auto pageheader-btn">
                    @can('role-create')
                    <a href="{{ url('setting/create') }}" class="btn btn-secondary btn-icon text-white btn-sm">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span> Tambah Data
                    </a>
                    @endcan
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @elseif ($message = Session::get('failed'))
            <div class="alert alert-warning">
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
                            <h3 class="card-title">Pengaturan</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">No</th>
                                            <th class="wd-15p">Nama Orang</th>
                                            <th class="wd-15p">Posisi/Jabatan</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($setting as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->nama_orang }}</td>
                                            <td>{{ $value->posisi }}</td>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ url('setting/edit',$value->id_setting) }}"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $value->id_setting }}"><i class="fa fa-trash"></i></button>
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
        <form action="{{ url('setting/delete') }}" method="post">
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
                    <input type="hidden" name="id_setting" id="id_setting_delete">
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
        $("#id_setting_delete").val(id);
        console.log(id);
    });

</script>
@endsection