@extends('layouts.app')

@section('title', 'Inventory - Edit Data Detail Kartu Barang')
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
        display: flex;
        gap: 10px;
    }
    
    .radio-options input[type="radio"] {
        margin-right: 5px;
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
                    <h1 class="page-title">Edit Detail Kartu Barang</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/detail')}}">Management Detail Kartu Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Detail Kartu Barang</li>
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
                                <h5 class="card-title">Edit Detail Kartu Barang</h5>
                            </div>
                        </div>

                        @if (count($errors) > 0)
                        <div class="mb-3 alert alert-danger">
                          <strong>Ups!</strong> Terdapat beberapa masalah dengan masukan Anda.<br><br>
                          <ul>
                             @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ url('detail/update') }}" method="POST">
                                    <div class="row row-xs align-items-center mb-4">
                                        <div class="col-md-3">
                                            <label class="mg-b-0 tx-semibold">Nama Barang</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <select class="form-control" name="id_barang" readonly>
                                                @foreach ($barang as $v)
                                                    @php
                                                        $statusA = "";
                                                        if($v->id_barang == $detail->id_barang){
                                                            $statusA = "selected";
                                                        }
                                                    @endphp
                                                    <option value="{{ $v->id_barang }}" {{ $statusA }}>{{ $v->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mb-4">
                                        <div class="col-md-3">
                                            <label class="mg-b-0 tx-semibold">No Urut Barang</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input type="text" name="no_urut" class="form-control" placeholder="No Urut Barang" value="{{ $detail->no_urut }}" readonly> 
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mb-4">
                                        <div class="col-md-3">
                                            <label class="mg-b-0 tx-semibold">Kondisi Barang</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="kondisi_barang" class="form-control">
                                                <option disabled>Pilih kondisi Barang</option>
                                                    <option value="1" {{ ($detail->kondisi_barang==1) ? 'selected' : ''  }}>Baik</option>
                                                    <option value="2" {{ ($detail->kondisi_barang==2) ? 'selected' : ''  }}>Kurang Baik</option>
                                                    <option value="3" {{ ($detail->kondisi_barang==3) ? 'selected' : ''  }}>Rusak</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mb-4">
                                        <div class="col-md-3">
                                            <label class="mg-b-0 tx-semibold">Tahun Pembelian</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <select class="form-control" name="id_tahun" readonly>
                                                @foreach ($tahun as $v)
                                                    @php
                                                        $statusA = "";
                                                        if($v->id_tahun == $detail->id_tahun){
                                                            $statusA = "selected";
                                                        }
                                                    @endphp
                                                    <option value="{{ $v->id_tahun }}" {{ $statusA }}>{{ $v->tahun }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mb-4">
                                        <div class="col-md-3">
                                            <label class="mg-b-0 tx-semibold">Sumber Anggaran</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <select class="form-control" name="id_anggaran" readonly>
                                                @foreach ($anggaran as $v)
                                                    @php
                                                        $statusA = "";
                                                        if($v->id_anggaran == $detail->id_anggaran){
                                                            $statusA = "selected";
                                                        }
                                                    @endphp
                                                    <option value="{{ $v->id_anggaran }}" {{ $statusA }}>{{ $v->nama_anggaran }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mb-4">
                                        <div class="col-md-3">
                                            <label class="mg-b-0 tx-semibold">Keterangan</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{ $detail->keterangan }}" readonly> 
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-end mb-0 mt-5">
                                        <div class="col-md-9">
                                            @csrf
                                            <input type="hidden" value="{{ $detail->id_detailkartu }}" name="id_detailkartu">
                                            <input type="hidden" value="{{ $detail->id_kartu }}" name="id_kartu" >
                                            <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                            <a class="btn ripple btn-secondary btn-sm" href="{{ url('detail/'.$detail->id_kartu) }}">Kembali</a>
                                        </div>
                                    </div>
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