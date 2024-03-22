@extends('layouts.app')

@section('title', 'Inventory - Tambah Barang Baru')

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
                        <li class="breadcrumb-item"><a href="{{url ('/barang')}}">Management Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
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
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div>
                                <h5 class="card-title">Tambah Barang</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ url('barang/store') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Barang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang"> 
                                    </div>
                                </div>
                        
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Tanggal Pembelian</label>
                                    </div>
                                    <div class="col-md-2 mg-t-5 mg-md-t-0">
                                        <input type="date" name="tgl_pembelian" class="form-control" placeholder="Tanggal Pembelian">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Kategori</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                       <select class="form-control form-select select2" name="nama_kategori">
                                        @foreach ($kategori as $value)
                                            <option value="{{ $value->id_kategori }}">{{ $value->nama_kategori }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                </div>
                        
                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                        <a class="btn ripple btn-secondary btn-sm" href="{{ url('/barang') }}">Kembali</a>
                                    </div>
                                </div>
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

@endsection