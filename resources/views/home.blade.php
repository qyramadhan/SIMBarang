@extends('layouts.app')

@section('title','Inventory - Dashboard')

@section('content')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="\home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card banner">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 text-center mb-3 mb-lg-0">
                                    <img src="{{ asset('assets/images/brand/unperba.png') }}" alt="img" class="w-95">
                                </div>
                                <div class="col-xl-9 col-lg-9 ps-lg-0">
                                    <div class="row">
                                        <div class="col-xl-7 col-lg-6">
                                            <div class="text-start text-white mt-xl-4">
                                                <h3 class="font-weight-semibold">Selamat Datang</h3>
                                                <h4 class="font-weight-normal">Di Aplikasi Sistem Informasi Inventory Barang</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 End-->

            <!-- Row 2-->
            <div class="row">
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-1">
                                <div class="col">
                                    <a href="{{ url('/barang') }}"><p class="mb-2">Total Barang</p></a>
                                    <h3 class="mb-0 number-font">{{ $count1 }}</h3>
                                </div>
                                <div class="col-auto mb-0">
                                    <div class="dash-icon text-orange">
                                        <i class="bx bxs-shopping-bags fs-22"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-1">
                                <div class="col">
                                    <a href="{{ url('/ruang') }}"><p class="mb-2">Total Ruang</p></a>
                                    <h3 class="mb-0 number-font">{{ $count2 }}</h3>
                                </div>
                                <div class="col-auto mb-0">
                                    <div class="dash-icon text-secondary1">
                                        <i class="bx bxs-wallet fs-22"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-1">
                                <div class="col">
                                    <a href="{{ url('/lantai') }}"><p class="mb-2">Total Lantai</p></a>
                                    <h3 class="mb-0 number-font">{{ $count3 }}</h3>
                                </div>
                                <div class="col-auto mb-0">
                                    <div class="dash-icon text-secondary">
                                        <i class="bx bxs-badge-dollar fs-22"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-1">
                                <div class="col">
                                    <a href="{{ url('/users') }}"><p class="mb-2">Total Pengguna</p></a>
                                    <h3 class="mb-0 number-font">{{ $count4 }}</h3>
                                </div>
                                <div class="col-auto mb-0">
                                    <div class="dash-icon text-warning">
                                        <i class="bx bxs-credit-card-front fs-22"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row-2 End -->

        </div>
        <!-- CONTAINER END -->
    </div>
</div>
<!--app-content closed-->
@endsection


@section('js')
@endsection
