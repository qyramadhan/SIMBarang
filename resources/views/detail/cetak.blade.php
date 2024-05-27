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
                                    @foreach($detail->take(1) as $value)
                                    <h4 class="card-title-print">Kartu Inventaris Barang {{$value->nama_ruang}}</h4></br>
                                    @endforeach

                                    <thead>
                                        @foreach($detail as $value)
                                        <tr>
                                            <td rowspan="2" class="card-title-print"><img src="{{asset('assets/images/brand/unperba.png')}}" width="100px" height="100px"></td>
                                            <td colspan="10" class="card-title-print">Univesitas Perwira Purbalingga</td>
                                            <td rowspan="2" class="card-title-print"><img src="{{asset('assets/images/brand/barang.png')}}" width="100px" height="100px"></td>
                                        </tr>
                                            <td>01</td>
                                            <td>10</td>
                                            <td>11</td>
                                            <td>05</td>
                                            <td>04</td>
                                            <td>01</td>
                                            <td>11</td>
                                            <td>12</td>
                                            <td>13</td>
                                            <td>14</td>
                                        </br>
                                        @endforeach
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
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/datatable.js') }}"></script>

{{-- <script>
    window.print();

</script> --}}
@endsection