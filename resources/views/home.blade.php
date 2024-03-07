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
                <div>
                    <h1 class="page-title">Hi! Welcome To Sistem Inventory Barang</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="\home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card  banner">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 text-center mb-3 mb-lg-0">
                                    <img src="{{ asset('assets/images/brand/unperba .png') }}" alt="img" class="w-95">
                                </div>
                                <div class="col-xl-9 col-lg-9 ps-lg-0">
                                    <div class="row">
                                        <div class="col-xl-7 col-lg-6">
                                            <div class="text-start text-white mt-xl-4">
                                                <h3 class="font-weight-semibold">Congratulations Steven</h3>
                                                <h4 class="font-weight-normal">You are Reached your targeted
                                                    milestone</h4>
                                                <p class="mb-lg-0 text-white-50">If you are going to use a
                                                    passage of Lorem Ipsum, you need to be sure there isn't
                                                    anything embarrassing hidden in the middle of text.</p>
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
                                    <p class="mb-2">Product Sold</p>
                                    <h3 class="mb-0 number-font">57,865</h3>
                                </div>
                                <div class="col-auto mb-0">
                                    <div class="dash-icon text-orange">
                                        <i class="bx bxs-shopping-bags fs-22"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="fs-12 text-success">
                                <strong>2.6%</strong>
                                <i class="mdi mdi-arrow-up"></i>
                            </span>
                            <span class="text-muted fs-12 ms-0 mt-1">than
                                last week
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-1">
                                <div class="col">
                                    <p class="mb-2">Total Balance</p>
                                    <h3 class="mb-0 number-font">$2,156</h3>
                                </div>
                                <div class="col-auto mb-0">
                                    <div class="dash-icon text-secondary1">
                                        <i class="bx bxs-wallet fs-22"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="fs-12 text-danger">
                                <strong>0.06%</strong>
                                <i class="mdi mdi-arrow-down"></i>
                            </span>
                            <span class="text-muted fs-12 ms-0 mt-1">than
                                last week
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-1">
                                <div class="col">
                                    <p class="mb-2">Sales Profit</p>
                                    <h3 class="mb-0 number-font">$12,105</h3>
                                </div>
                                <div class="col-auto mb-0">
                                    <div class="dash-icon text-secondary">
                                        <i class="bx bxs-badge-dollar fs-22"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="fs-12 text-danger">
                                <strong>0.15%</strong>
                                <i class="mdi mdi-arrow-down"></i>
                            </span>
                            <span class="text-muted fs-12 ms-0 mt-1">than
                                last week
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-1">
                                <div class="col">
                                    <p class="mb-2">Total Expenses</p>
                                    <h3 class="mb-0 number-font">$4,673</h3>
                                </div>
                                <div class="col-auto mb-0">
                                    <div class="dash-icon text-warning">
                                        <i class="bx bxs-credit-card-front fs-22"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="fs-12 text-success">
                                <strong>1.05%</strong>
                                <i class="mdi mdi-arrow-up"></i>
                            </span>
                            <span class="text-muted fs-12 ms-0 mt-1">than
                                last week
                            </span>
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
