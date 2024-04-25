@extends('layouts.app')

@section('title','Inventory - Management Detail Kartu Barang')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Management Detail Kartu Barang</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Management Detail Kartu Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Kartu Barang</li>
                    </ol>
                </div>
                <div class="ms-auto pageheader-btn">
                    @can('role-create')
                    <a href="{{ url('detail/create') }}" class="btn btn-secondary btn-icon text-white btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span> Tambah Data
                    </a>
                    @endcan
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="mb-3 alert alert-success">
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
                            <h3 class="card-title">Data Detail Kartu Barang {{ $detail->nama_ruang}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">No</th>
                                            <th class="wd-15p">Nama Barang</th>
                                            <th class="wd-15p">Jumlah Barang</th>
                                            <th class="wd-15p">Kondisi Barang</th>
                                            <th class="wd-15p">Keterangan</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($detail as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value->nama_barang }}</td>
                                                <td>{{ $value->jumlah_barang }}</td>
                                                <td>{{ $value->kondisi_barang }}</td>
                                                <td>{{ $value->keterangan }}</td>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{ url('detail/edit',$value->id_detailkartu) }}"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $value->id_detailkartu }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach --}}
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
        <form action="{{ url('detail/delete') }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin untuk menghapus data?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_detail" id="id_detail_delete">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    @csrf
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Detail Kartu Barang</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-content">
                        <form action="{{ url('detail/store') }}" method="POST">
                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-4">
                                    <label class="mg-b-0 tx-semibold">Nama Barang</label>
                                </div>
                                <div class="col-md-12 mg-t-5 mg-md-t-0">
                                    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="nama_barang">
                                        @foreach ($barang as $value)
                                            <option value="{{ $value->id_barang }}">{{ $value->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-4">
                                    <label class="mg-b-0 tx-semibold">Jumlah Barang</label>
                                </div>
                                <div class="col-md-12 mg-t-5 mg-md-t-0">
                                    <input type="text" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-4">
                                    <label class="mg-b-0 tx-semibold">Kondisi Barang</label>
                                </div>
                                <div class="col-md-12 mg-t-5 mg-md-t-0">
                                    <input type="text" name="kondisi_barang" class="form-control" placeholder="Kondisi Barang"> 
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-4">
                                    <label class="mg-b-0 tx-semibold">Keterangan</label>
                                </div>
                                <div class="col-md-12 mg-t-5 mg-md-t-0">
                                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <input type="text" name="id_detail" id="id_detail_simpan">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection

@section('js')
<!-- INTERNAL  DATA TABLE JS-->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/datatable.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/form-elements.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>

<script>
    $('#exampleModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $("#id_detail_delete").val(id);
    });

    $('#exampleModal1').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $("#id_detail_simpan").val(id);
    });

</script>
@endsection