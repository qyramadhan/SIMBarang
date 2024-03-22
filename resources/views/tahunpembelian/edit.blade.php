@extends('layouts.app')

@section('title', 'Inventory - Edit Tahun Pembelian')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Tahun Pembelian</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/tahun') }}">Management Tahun Pembelian</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Tahun Pembelian</li>
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
                                <h5 class="card-title">Edit Tahun Pembelian</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ url('tahun/update') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Tahun Pembelian</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="tahun" class="form-control" placeholder="Tahun Pembelian" value="{{ $tahunpembelian->tahun }}"> 
                                    </div>
                                </div>

                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <input type="hidden" value="{{ $tahunpembelian->id_tahun}}" name="id_tahun">
                                        <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                        <a class="btn ripple btn-secondary btn-sm" href="{{ url('/tahun') }}">Kembali</a>
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