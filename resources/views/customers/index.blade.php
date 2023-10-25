@extends('layouts.master')
@section('content')
<!-- Main content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Customers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">List Customers</li>
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
                        <button type="button" id="addCustomers" data-toggle="modal" data-target="#modalCustomers" class="btn btn-outline-primary">
                            <i class="fa fa-plus"></i> Add Customers
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tableCustomers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Creaeted At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Creaeted At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <!-- Modal Customers -->
            <div class="modal fade" id="modalCustomers">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <h4 class="modal-title">Add Customer</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <form role="form" name="formCustomers" id="formCustomers" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="merchants">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Customers Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="merchants">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Customers Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="merchants">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Customers Phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="merchants">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Customers Address">
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
@include('customers.javascript')
@endpush