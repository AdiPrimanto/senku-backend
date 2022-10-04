@extends('layouts.default')

@section('content')
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">Rp. <span class="count">{{ $income }}</span></div>
                                    <div class="stat-heading">Penghasilan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $sales }}</span></div>
                                    <div class="stat-heading">Penjualan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <!--  /Traffic -->
        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Pembelian Terbaru </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Nomor</th>
                                            <th>Total Transaksi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->number }}</td>
                                                <td>Rp. {{ $item->transaction_total }}</td>
                                                <td>
                                                    @if($item->transaction_status == 'PENDING')
                                                        <span class="badge badge-info">
                                                    @elseif($item->transaction_status == 'SUCCESS')
                                                        <span class="badge badge-success">
                                                    @elseif($item->transaction_status == 'FAILED')
                                                        <span class="badge badge-danger">
                                                    @else
                                                        <span>
                                                    @endif
                                                        {{$item->transaction_status}}
                                                        </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center p-5">Data tidak tersedia</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.card -->
                </div>  <!-- /.col-lg-8 -->

                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="card br-0">
                                <div class="card-body">
                                    <div class="chart-container ov-h">
                                        <div id="flotPie1" class="float-chart"></div>
                                    </div>
                                </div>
                            </div><!-- /.card -->
                        </div>
                    </div>
                </div> <!-- /.col-md-4 -->
            </div>
        </div>
        <!-- /.orders -->
    <!-- /#add-category -->
    </div>
    <!-- .animated -->
@endsection

@push('after-script')

@endpush