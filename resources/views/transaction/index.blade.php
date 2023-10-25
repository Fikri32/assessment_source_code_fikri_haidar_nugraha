@extends('layouts.master')
@section('content')
<!-- Main content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Transactions</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">List Transactions</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" id="addTransactions" data-toggle="modal" data-target="#modalTransactions" class="btn btn-outline-primary">
                            <i class="fa fa-plus"></i> Add Transactions
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tableTransactions" class="table table-bordered table-striped">
                            <thead>
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
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
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
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <!-- Modal Transactions -->
            <div class="modal fade" id="modalTransactions">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <h4 class="modal-title">Add Transaction</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <form role="form" name="formTransactions" id="formTransactions" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Merchant Name</label>
                                                <select class="form-control" id="merchant" name="id_merchants" style="width: 100%;">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Outlet Name</label>
                                                <select class="form-control" id="outlet" name="id_outlets" style="width: 100%;">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Staff Name</label>
                                                <select class="form-control" id="staff" name="id_staff" style="width: 100%;">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Customer Name</label>
                                                <select class="form-control" id="customer" name="id_customers" style="width: 100%;">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="merchants">Pay Amount</label>
                                                <input type="number" class="form-control input-currency" id="pay_amount" name="pay_amount"  type-currency="IDR" placeholder="Pay Amount">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="merchants">Tax</label>
                                                <input type="number" class="form-control" id="tax" name="tax" placeholder="Tax" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="merchants">Change Amount</label>
                                                <input type="number" class="form-control" id="change_amount" name="change_amount" placeholder="Change Amount" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="merchants">Total Amount</label>
                                                <input type="number" class="form-control" id="total_amount" name="total_amount" placeholder="Total Amount" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="merchants">Transaction Time</label>
                                                <input type="date" class="form-control" id="transaction_time" name="transaction_time" placeholder="Enter Transaction Time">
                                            </div>
                                            <div class="form-group">
                                                <label>Payment Type</label>
                                                <select class="form-control" id="payment_type" name="payment_type" style="width: 100%;">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Payment Status</label>
                                                <select class="form-control" id="payment_status" name="payment_status" style="width: 100%;">

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </form>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveBtn">
                                <i class="fa fa-check"></i> Save
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('scripts')
@include('transaction.javascript')
@endpush