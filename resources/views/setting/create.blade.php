@extends('layouts.app')

@section('title', 'Inventory - Tambah Pengaturan')

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
                        <li class="breadcrumb-item"><a href="{{url ('/setting')}}">Management Pengaturan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pengaturan</li>
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
                                <h5 class="card-title">Tambah Pengaturan</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ url('setting/store') }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Orang</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="nama_orang" class="form-control" placeholder="Nama Orang"> 
                                    </div>
                                </div>
                        
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Posisi/Jabatan</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="posisi" class="form-control" placeholder="Posisi/Jabatan">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Nama Atasan</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                       <select class="form-control form-select select2" name="id_atasan">
                                        <option value="0">Atasan</option>                                       
                                        @foreach ($setting as $value)
                                            <option value="{{ $value->id_setting }}">{{ $value->nama_orang }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                </div>
                        
                                <div class="form-group row justify-content-end mb-0 mt-5">
                                    <div class="col-md-9">
                                        @csrf
                                        <button type="submit" class="btn ripple btn-primary btn-sm">Simpan</button>
                                        <a class="btn ripple btn-secondary btn-sm" href="{{ url('/setting') }}">Kembali</a>
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