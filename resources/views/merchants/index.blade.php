@extends('layouts.master')
@section('content')
<!-- Main content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Merchants</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">List Merchants</li>
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
                        <button type="button" id="addMerchants" data-toggle="modal" data-target="#modalMerchants" class="btn btn-outline-primary">
                            <i class="fa fa-plus"></i> Add Merchant
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tableMerchants" class="table table-striped">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Merchant Name</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Merchant Name</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <!-- Modal Merchants -->
            <div class="modal fade" id="modalMerchants">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <h4 class="modal-title">Add Merchant</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <form role="form" name="formMerchants" id="formMerchants" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="merchants">Merchant Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Merchant Name">
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
@include('merchants.javascript')
@endpush