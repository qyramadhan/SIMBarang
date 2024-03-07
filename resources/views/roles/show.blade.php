@extends('layouts.app')

@section('title','Inventory - Detail Roles')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
	<div class="side-app">

		<!-- CONTAINER -->
		<div class="main-container container-fluid">

			<!-- PAGE-HEADER -->
			<div class="page-header">
				<div>
					<h1 class="page-title">Detail Roles</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Manage Roles</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail Roles</li>
					</ol>
				</div>
			</div>
			<!-- PAGE-HEADER END -->

			<!-- Row-2 OPEN-->
			<div class="row">
				<div class="col-xl-12 col-xxl-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Tentang</h3>
						</div>
						<div class="card-body">
                            <div class="form-content">
                                <div class="row row-xs align-items-center mb-4">
                                    <div class="col-md-3">
                                        <label class="mg-b-0 tx-semibold">Roles</label>
                                    </div>
                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
										<p class="text-muted">{{ $role->name }}</p>
									</div>
									<div class="form-content">
                                        <div class="row row-xs align-items-center mb-4">
                                            <div class="col-md-3">
                                                <label class="mg-b-0 tx-semibold">Permission</label>
                                            </div>
                                            <div class="col-md-9 row mb-3 mt-2">
												<p class="mb-0 row text-muted">
													@if(!empty($rolePermissions))
													@foreach($rolePermissions as $v)
														<label>{{ $v->name }},</label>
													@endforeach
													@endif
												</p>
											</div>
										</div>
										<div>
											<a class="btn ripple btn-secondary" href="{{ route('roles.index') }}">Kembali</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- Row-2 CLOSED-->

		</div>
		<!-- CONTAINER CLOSED -->

	</div>
</div>
<!--app-content closed-->

@endsection
@section('js')

@endsection