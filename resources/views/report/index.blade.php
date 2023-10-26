@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Report Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Report Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$totalTransaksi}}</h3>

                        <p>Total Transactions</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-card"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Rp {{$totalPendapatanFormatted}}</h3>

                        <p>Income</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$totalPelanggan}}</h3>

                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$totalTransaksiPerMerchant->count()}}</h3>

                        <p>Total Transaction Per Merchant</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="date" class="form-control" id="filterDate" placeholder="Filter berdasarkan Tanggal">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="filterMerchant" name="filterMerchant">

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="filterOutlet" name="filterOutlet">

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select id="filterPaymentStatus" class="form-control">
                                        <option value="">Payment Status</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Not Paid">Not Paid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableTransactions" class="table table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Merchant Name</th>
                                        <th class="text-center">Outlet Name</th>
                                        <th class="text-center">Transaction Date</th>
                                        <th class="text-center">Transaction Time</th>
                                        <th class="text-center">Staff</th>
                                        <th class="text-center">Pay Amount</th>
                                        <th class="text-center">Payment Type</th>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center">Tax</th>
                                        <th class="text-center">Change Amount</th>
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Payment Status</th>
                                        <th class="text-center">Created At</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Total Transaction Per Month</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 500; height: 500; max-height: 500; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('scripts')
@include('report.javascript')
@endpush