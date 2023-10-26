<script>
    //Initialize Select2 Elements

    $(document).ready(function() {
        // Var id Edit
        var idEdit = 0;
        //  End

        // Transaction Count
        $("#pay_amount").on('input', function() {
            // Ambil nilai dari input Pay Amount
            var payAmountText = $(this).val();

            // Hapus karakter "Rp" dan tanda titik pemisah ribuan
            var payAmountCleaned = payAmountText.replace(/[^0-9,.-]+/g, "");

            // Konversi menjadi angka float
            var payAmount = parseFloat(payAmountCleaned.replace(",", "."));

            // Pastikan nilai Pay Amount adalah angka yang valid
            if (!isNaN(payAmount)) {
                // Hitung Tax (11% dari Pay Amount)
                var tax = (payAmount * 11) / 100;

                // Hitung Total Amount (Pay Amount + Tax)
                var totalAmount = payAmount + tax;

                // Hitung Change Amount (Total Amount - Pay Amount)
                var changeAmount = totalAmount - payAmount;

                // Set nilai pada input Tax, Change Amount, dan Total Amount dalam format Rupiah
                $("#tax").val((tax.toFixed(2)));
                $("#change_amount").val((changeAmount.toFixed(2)));
                $("#total_amount").val((totalAmount.toFixed(2)));
            } else {
                // Jika nilai Pay Amount tidak valid, berikan pesan kesalahan atau reset input
                // Misalnya: $("#pay_amount").val(''); atau tampilkan pesan error
            }
        });
        //End 

        // Format Rupiah
        function formatRupiah(angka) {
            var number_string = angka.toString();
            var split = number_string.split('.');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp ' + rupiah;
        }
        // End Format

        // Initial Select 2
        $('#merchant').select2({
            theme: 'bootstrap4',
        });
        $('#outlet').select2({
            theme: 'bootstrap4',
        });
        $('#staff').select2({
            theme: 'bootstrap4',
        });
        $('#customer').select2({
            theme: 'bootstrap4',
        });
        // End


        // Initial Datatable
        // Show Data
        var table = $('#tableTransactions').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,
            scrollX: true,
            dom: 'lBfrtip',
            buttons: [
                'csv'
            ],
            ajax: "{{ route('transactions.data') }}",
            'columnDefs': [{

                "className": "text-center",
                "targets": "_all"

            }],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'id_merchants',
                    name: 'id_merchants'
                },
                {
                    data: 'id_outlets',
                    name: 'id_outlets'
                },
                {
                    data: 'transaction_date',
                    name: 'transaction_date'
                },
                {
                    data: 'transaction_time',
                    name: 'transaction_time'
                },
                {
                    data: 'id_staff',
                    name: 'id_staff'
                },
                {
                    data: 'pay_amount',
                    name: 'pay_amount',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'payment_type',
                    name: 'payment_type'
                },
                {
                    data: 'id_customers',
                    name: 'id_customers'
                },
                {
                    data: 'tax',
                    name: 'tax',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'change_amount',
                    name: 'change_amount',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'total_amount',
                    name: 'total_amount',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'payment_status',
                    name: 'payment_status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        // End Initial Datatable

        // Load Relational Data
        $('#addTransactions').click(function() {
            idEdit = 0;
            $('#formTransactions').trigger('reset');
            $('#modalTransactions .modal-title').text("Add Outlet");
            $('#modalTransactions').modal('show');
            // Merchant
            $("#merchant").empty();
            $("#merchant").append('<option value="">Choose Merchant</option>');
            // Outlet
            $("#outlet").empty();
            $("#outlet").append('<option value="">Choose Outlet</option>');
            // Staff
            $("#staff").empty();
            $("#staff").append('<option value="">Choose Staff</option>');
            // Customer
            $("#customer").empty();
            $("#customer").append('<option value="">Choose Customer</option>');
            //Payment Type
            $("#payment_type").empty();
            $("#payment_type").append('<option value="">Choose Payment Type</option>');
            $("#payment_type").append('<option value="Cash">Cash</option>');
            $("#payment_type").append('<option value="Credit Card">Credit Card</option>');
            $("#payment_type").append('<option value="Debit Card">Debit Card</option>');

            //Payment Status
            $("#payment_status").empty();
            $("#payment_status").append('<option value="">Choose Payment Status</option>');
            $("#payment_status").append('<option value="Paid">Paid</option>');
            $("#payment_status").append('<option value="Not Paid">Not Paid</option>');
            $.ajax({
                url: "{{ route('transactions.getRelationalData') }}",
                type: 'GET',
                success: function(res) {
                    $.each(res.merchant, function(key, value) {
                        $("#merchant").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                    $.each(res.outlet, function(key, value) {
                        $("#outlet").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                    $.each(res.staff, function(key, value) {
                        $("#staff").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                    $.each(res.customer, function(key, value) {
                        $("#customer").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                }
            })
        });

        // Edit Outlet
        $('body').on('click', '.edit', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route("transactions.edit",":id") }}'
            url = url.replace(':id', id)
            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    console.log(res)
                    idEdit = res.data.id;
                    $('#modalTransactions').trigger("reset");
                    $('#modalTransactions .modal-title').text("Edit Outlet");
                    $('#modalTransactions').modal('show');
                    $('#name').val(res.data.name);
                    $('#pay_amount').val(res.data.pay_amount);
                    $("#tax").val(res.data.tax);
                    $("#change_amount").val(res.data.change_amount);
                    $("#total_amount").val(res.data.total_amount);
                    // Format tipe tanggal
                    $("#transaction_time").val(res.data.transaction_time.split(' ').join('T'));

                    // $("#transaction_time").val(formattedDate);
                    // Reset select form
                    $("#merchant").empty()
                    $("#outlet").empty()
                    $("#staff").empty()
                    $("#customer").empty()
                    // Get Value from DB
                    $.each(res.merchant, function(key, value) {
                        $("#merchant").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                    $.each(res.outlet, function(key, value) {
                        $("#outlet").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                    $.each(res.staff, function(key, value) {
                        $("#staff").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                    $.each(res.customer, function(key, value) {
                        $("#customer").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                    // Change selected Value
                    $("#merchant").val(res.data.id_merchants).trigger('change');
                    $("#outlet").val(res.data.id_outlets).trigger('change');
                    $("#staff").val(res.data.id_staff).trigger('change');
                    $("#customer").val(res.data.id_customers).trigger('change');

                    //Payment Type
                    $("#payment_type").empty();
                    $("#payment_type").append('<option value="">Choose Payment Type</option>');
                    $("#payment_type").append('<option value="Cash">Cash</option>');
                    $("#payment_type").append('<option value="Credit Card">Credit Card</option>');
                    $("#payment_type").append('<option value="Debit Card">Debit Card</option>');

                    //Payment Status
                    $("#payment_status").empty();
                    $("#payment_status").append('<option value="">Choose Payment Status</option>');
                    $("#payment_status").append('<option value="Paid">Paid</option>');
                    $("#payment_status").append('<option value="Not Paid">Not Paid</option>');

                    $("#payment_type").val(res.data.payment_type).trigger('change');
                    $("#payment_status").val(res.data.payment_status).trigger('change');
                }
            })
        });
        // End Edit

        // Create and Update Outlet
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            var url = idEdit ? "{{ route('transactions.update', ':id') }}" : "{{ route('transactions.store') }}";
            url = url.replace(':id', idEdit);
            var type = idEdit ? "PUT" : "POST";
            $.ajax({
                data: $('#formTransactions').serialize(),
                url: url,
                type: type,
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                        title: 'Success !',
                        icon: 'success',
                        showConfirmButton: true
                    })
                    $('#formTransactions').trigger('reset');
                    $('#modalTransactions').modal('hide');
                    $('#tableTransactions').DataTable().ajax.reload();
                    console.log('testing')
                },
                error: function(data) {
                    console.log('Error:', data);
                    console.log('testing')
                }
            });
        });
        // End Create and Update Outlet

        // Delete Outlet
        $('body').on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route("transactions.delete", ":id") }}';
            url = url.replace(':id', id);
            Swal.fire({
                    title: 'Are You Sure ?',
                    icon: 'warning',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak, Batalkan!',
                    allowOutsideClick: false,
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            },
                            type: 'DELETE',
                            url: url,
                            success: function(response) {

                                Swal.fire({
                                    title: 'Berhasil!',
                                    icon: 'success',
                                    text: 'Data Berhasil Di Hapus',
                                    showConfirmButton: true
                                })

                                table.draw()
                            }
                        })
                    } else {
                        Swal.close()
                    }
                })
        })
        // End Delete Outlet
    });
</script>