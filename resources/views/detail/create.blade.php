@extends('layouts.app')

@section('title', 'Inventory - Tambah Detail Kartu Barang Baru')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Tambah Detail Kartu Barang</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/detail')}}">Management Detail Kartu Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Detail Kartu Barang</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div>
                                <h5 class="card-title">Tambah Detail Kartu Barang</h5>
                            </div>
                        </div>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Ups!</strong> Terdapat beberapa masalah dengan masukan Anda.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Tambah Detail Kartu Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-content">
                                            <form action="{{ url('detail/store') }}" method="POST">                                   
                                            <div class="row row-xs align-items-center mb-4">
                                                <div class="col-md-3">
                                                    <label class="mg-b-0 tx-semibold">Jumlah Barang</label>
                                                </div>
                                                <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                    <input type="text" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
                                                </div>
                                            </div>
            
                                            <div class="row row-xs align-items-center mb-4">
                                                <div class="col-md-3">
                                                    <label class="mg-b-0 tx-semibold">Kondisi Barang</label>
                                                </div>
                                                <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                    <input type="text" name="kondisi_barang" class="form-control" placeholder="Kondisi Barang"> 
                                                </div>
                                            </div>
            
                                            <div class="row row-xs align-items-center mb-4">
                                                <div class="col-md-3">
                                                    <label class="mg-b-0 tx-semibold">Keterangan</label>
                                                </div>
                                                <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan"> 
                                                </div>
                                            </div>
                                    
                                            <div class="form-group row justify-content-end mb-0 mt-5">
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                                    <a class="btn ripple btn-secondary btn-sm" href="{{ url('/detail') }}">Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        @csrf
                                        <input type="hidden" name="id_detail" id="id_detail_simpan">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card-body">
                            <div class="form-content">
                                <form action="{{ url('detail/store') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Ruang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <select class="form-control form-select select2" name="nama_ruang">
                                         @foreach ($detail as $value)
                                             <option value="{{ $value->id_ruang }}">{{ $ruang->nama_ruang }}</option>
                                         @endforeach
                                        </select>
                                     </div>
                                </div>
                        
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Jumlah Barang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Kondisi Barang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="kondisi_barang" class="form-control" placeholder="Kondisi Barang"> 
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Keterangan</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan"> 
                                    </div>
                                </div>
                        
                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                        <a class="btn ripple btn-secondary btn-sm" href="{{ url('/detail') }}">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<!-- ROW-1 CLOSED -->

      </div>
<!-- CONTAINER CLOSED -->

  </div>
</div>
<!--app-content closed-->
{!! Form::close() !!}

@endsection
@section('js')
<script>
    $('#exampleModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $("#id_detail_simpan").val(id);
    });
</script>
@endsection