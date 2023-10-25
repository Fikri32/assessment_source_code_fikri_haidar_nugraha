<script>
    //Initialize Select2 Elements
    $('#merchant').select2({
        theme: 'bootstrap4',
    });
    $(document).ready(function() {
        // Var id Edit
        var idEdit = 0;

        // Initial Datatable
        // Show Data
        var table = $('#tableOutlets').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('outlets.data') }}",
            'columnDefs': [{

                "className": "text-center",
                "targets": "_all"

            }],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'id_merchants',
                    name: 'id_merchants'
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

        // Load Merchant
        $('#addOutlets').click(function() {
            idEdit = 0;
            $('#formOutlets').trigger('reset');
            $('#modalOutlets .modal-title').text("Add Outlet");
            $('#modalOutlets').modal('show');
            $("#merchant").empty();
            $("#merchant").append('<option value="">Choose Merchant</option>');
            $.ajax({
                url: "{{ route('outlets.getMerchants') }}",
                type: 'GET',
                success: function(res) {
                    $.each(res.data, function(key, value) {
                        $("#merchant").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                }
            })
        });
        // Clear content when show modal
        $('#addOutlets').click(function() {
            idEdit = 0;
            $('#formOutlets').trigger('reset');
            $('#modalOutlets .modal-title').text("Add Outlet");
            $('#modalOutlets').modal('show');
        });
        // End Clear

        // Edit Outlet
        $('body').on('click', '.edit', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route("outlets.edit",":id") }}'
            url = url.replace(':id', id)
            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    console.log(res)
                    idEdit = res.data.id;
                    $('#modalOutlets').trigger("reset");
                    $('#modalOutlets .modal-title').text("Edit Outlet");
                    $('#modalOutlets').modal('show');
                    $('#name').val(res.data.name);
                    $("#merchant").empty()
                    $.each(res.merchant, function(key, value) {
                        $("#merchant").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                    $("#merchant").val(res.data.id_merchants).trigger('change');
                }
            })
        });
        // End Edit

        // Create and Update Outlet
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            var url = idEdit ? "{{ route('outlets.update', ':id') }}" : "{{ route('outlets.store') }}";
            url = url.replace(':id', idEdit);
            var type = idEdit ? "PUT" : "POST";
            $.ajax({
                data: $('#formOutlets').serialize(),
                url: url,
                type: type,
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                        title: 'Success !',
                        icon: 'success',
                        showConfirmButton: true
                    })
                    $('#formOutlets').trigger('reset');
                    $('#modalOutlets').modal('hide');
                    $('#tableOutlets').DataTable().ajax.reload();
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
            var url = '{{ route("outlets.delete", ":id") }}';
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