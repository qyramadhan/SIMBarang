@extends('layouts.app')

@section('title','Inventory - Cetak Data Detail Barang')

@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <div>
            </div>

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <td rowspan="2"><img src="{{ asset('assets/images/brand/unperba.png') }}" width="100" height="100"></td>
                                            <td colspan="10">Universitas Perwira Purbalingga</td>
                                            <td rowspan="2"></td>
                                        </tr>
                                        <tr>
                                            {{-- @foreach ($detail as $key => $value) --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            {{-- @endforeach --}}
                                        </tr>
                                    </thead>
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

@endsection

@section('js')
<!-- INTERNAL  DATA TABLE JS-->
<script src=".{{ asset('/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/js/jszip.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src=".{{ asset('/plugins/datatable/datatable.js') }}"></script>

<script>
    window.print();

</script>
@endsection