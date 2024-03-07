@extends('layouts.app')

@section('title', 'Inventory - Edit Users')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Edit Users</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route ('users.index')}}">Manage Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                <h5 class="card-title">Edit Users</h5>
                            </div>
                        </div>

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                             @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="form-content">
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Name:</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}"> 
                                    </div>
                                </div>
                        
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Email:</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                    </div>
                                </div>
                        
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Password:</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                        
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Confirm Password:</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <input type="password" name="confirm-password" class="form-control" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                        
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Role:</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                        <select class="form-control" name="roles[]">
                                            @foreach ($roles as $v)
                                                <option value="{{ $v }}" {{ in_array($v, $userRole) ? "selected" : "" }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row justify-content-end mb-0 mt-5">
                                        <div class="col-md-9">
                                            <button type="submit" class="btn ripple btn-primary">Submit</button>
                                            <a class="btn ripple btn-secondary" href="{{ route('users.index') }}">Kembali</a>
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