@extends('layouts.app')

@section('title','Inventory - Cetak Data Ruang')

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
                                    <h4 class="card-title-print">Data Ruang</h4>
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">No</th>
                                            <th class="wd-15p">Kode Ruang</th>
                                            <th class="wd-15p">Nama Ruang</th>
                                            <th class="wd-15p">Nama Lantai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ruang as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->kode_ruang }}</td>
                                            <td>{{ $value->nama_ruang }}</td>
                                            <td>{{ $value->nama_lantai }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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
<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="../assets/plugins/datatable/js/jszip.min.js"></script>
<script src="../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="../assets/plugins/datatable/datatable.js"></script>

<script>
    window.print();

</script>
@endsection