@extends('layouts.app')

@section('title','Inventory - Management Detail Kartu Barang')
@section('css')
<style>
    .textbox-container {
        margin-top: 10px;
    }
    
    .textbox-container input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    
    .textbox-container input[type="text"]:focus {
        border-color: #007bff;
        outline: none;
    }
    .radio-options {
        display: block;
        gap: 50px;
    }
    
    .radio-options input[type="radio"] {
        margin-right: 10px;
    }
    </style>
@endsection
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
                    <a href="{{ url('detail/cetak',$id_kartu) }}" target="_blank" class="btn btn-success btn-icon text-white btn-sm">
                        <span>
                            <i class="fa fa-print"></i>
                        </span> Cetak Label
                    </a>
                    <a href="{{ url('detail/cetakkartu',$id_kartu) }}" target="_blank" class="btn btn-success btn-icon text-white btn-sm">
                        <span>
                            <i class="fa fa-print"></i>
                        </span> Cetak Kartu
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
                            <h3 class="card-title">Data Detail Kartu Barang {{ $info->nama_ruang }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">No</th>
                                            <th class="wd-15p">Kode Barang</th>
                                            <th class="wd-15p">Nama Barang</th>
                                            <th class="wd-15p">Kondisi Barang</th>
                                            <th class="wd-15p">Tahun Pembelian</th>
                                            <th class="wd-15p">Keterangan Barang</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail as $key => $value)
                                            <tr>
                                                @php
                                                    $txt = $value->no_urut;
                                                    $no  = (int) $txt;
                                                    $number = NULL;

                                                    if($no <= 9){
                                                        $number = "0-0-".$no;
                                                    }elseif($no >= 10 && $no <= 99 ){
                                                        $number = "0-".substr($no,0,1).'-'.substr($no,1,1);
                                                    }elseif($no >= 100 && $no <= 999 ){
                                                        $number = substr($no,0,1).'-'.substr($no,1,1).'-'.substr($no,2,1);
                                                    }elseif($no >= 1000){
                                                        $number = substr($no,0,1).'-'.substr($no,1,1).'-'.substr($no,2,1).'-'.substr($no,3,1);
                                                    }
                                                @endphp

                                                <td>{{ ++$key }}</td>
                                                {{-- @php
                                                    $no_urut = App\Http\Controllers\DetailKartuController::getUrutBarang($value->id_kartu, $value->id_barang, $value->id_tahun, $value->id_anggaran, $value->kondisi_barang)
                                                @endphp --}}
                                                <td>{{ $value->kode_golongan.' | '.$value->kode_jenis.' | '.$value->kode_barang.' | '.$number.' | '.substr($value->tahun,2).' | '.$value->kode_lantai.' | '.$value->kode_ruang.' | '.$value->kode_anggaran }}</td>
                                                <td>{{ $value->nama_barang }}</td>
                                                <td>
                                                    @if ($value->kondisi_barang == 1)
                                                        Baik
                                                    @elseif($value->kondisi_barang == 2)
                                                        Kurang Baik
                                                    @else
                                                        Rusak
                                                    @endif
                                                </td>
                                                <td>{{ $value->tahun }}</td>
                                                <td>{{ $value->keterangan }}</td>
                                                
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{ url('detail/edit',$value->id_detailkartu) }}" ><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $value->id_detailkartu }}"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="id_detailkartu" id="id_detail_delete">
                    <input type="hidden" name="id_kartu" class="form-control" value="{{ $id_kartu }}">
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
                                    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="id_barang" required>
                                    <option selected disabled>Pilih Barang</option>    
                                        @foreach ($barang as $value)
                                            <option value="{{ $value->id_barang }}">{{ $value->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center">
                                <div class="col-md-4">
                                    <label class="mg-b-0 tx-semibold">No Urut Barang</label>
                                </div>
                                <div class="col-md-12 mg-t-5 mg-md-t-0">
                                    <div class="radio-options">
                                        <input type="radio" id="option1" name="no_urut" value="0" onclick="showTextBox('option1')">
                                        <label for="option1">Data Tunggal</label>
                                        
                                        <input type="radio" id="option2" name="no_urut" value="1" onclick="showTextBox('option2')">
                                        <label for="option2">Data Masal</label>
                                    </div>
                                </div>
                            </div>
                            <div id="tunggal" style="display: none" class="row col-md-12">
                                <input id="urut" type="text" name="tunggal" class="form-control" placeholder="Dari">
                            </div>
                            <div id="masal" style="display: none" class="row">
                                <div class="col-md-6">
                                    <input id="urut" type="text" name="dari" class="form-control" placeholder="Dari">
                                </div>
                                <div class="col-md-6">
                                    <input id="urut" type="text" name="sampai" class="form-control" placeholder="Sampai">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-4">
                                    <label class="mg-b-0 tx-semibold">Kondisi Barang</label>
                                </div>
                                <div class="col-md-12 mg-t-5 mg-md-t-0">
                                    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="kondisi_barang" class="form-control">
                                    <option selected disabled>Pilih Kondisi Barang</option>
                                        <option value="1">Baik</option>
                                        <option value="2">Kurang Baik</option>
                                        <option value="3">Rusak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-4">
                                    <label class="mg-b-0 tx-semibold">Tahun Pembelian</label>
                                </div>
                                <div class="col-md-12 mg-t-5 mg-md-t-0">
                                    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="id_tahun" required>
                                    <option selected disabled>Pilih Tahun</option>    
                                    @foreach ($tahun as $value)
                                            <option value="{{ $value->id_tahun }}">{{ $value->tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mb-4">
                                <div class="col-md-4">
                                    <label class="mg-b-0 tx-semibold">Sumber Anggaran</label>
                                </div>
                                <div class="col-md-12 mg-t-5 mg-md-t-0">
                                    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="id_anggaran" required>
                                    <option selected disabled>Pilih Anggaran</option>    
                                    @foreach ($anggaran as $value)
                                        <option value="{{ $value->id_anggaran }}">{{ $value->nama_anggaran }}</option>
                                    @endforeach
                                    </select>
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
                        <input type="hidden" name="id_kartu" class="form-control" value="{{ $id_kartu }}">
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

    function showTextBox(option) {
        if (option === 'option1') {
            $('#tunggal').show();
            $('#masal').hide();
        } else if (option === 'option2') {
            $('#tunggal').hide();
            $('#masal').show();
        }
    }
</script>
@endsection