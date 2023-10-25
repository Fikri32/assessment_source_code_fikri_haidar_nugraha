<script>
    $(document).ready(function() {
        // Var id Edit
        var idEdit = 0;

        // Initial Datatable
        // Show Data
        var table = $('#tableMerchants').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('merchants.data') }}",
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

        // Clear content when show modal
        $('#addMerchants').click(function() {
            idEdit = 0;
            $('#formMerchants').trigger('reset');
            $('#modalMerchants .modal-title').text("Add Merchant");
            $('#modalMerchants').modal('show');
        });
        // End Clear

        // Edit Merchant
        $('body').on('click', '.edit', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route("merchants.edit",":id") }}'
            url = url.replace(':id', id)
            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    console.log(res)
                    idEdit = res.data.id;
                    $('#modalMerchants').trigger("reset");
                    $('#modalMerchants .modal-title').text("Edit Merchant");
                    $('#modalMerchants').modal('show');
                    $('#name').val(res.data.name);

                }
            })
        });
        // End Edit

        // Create and Update Merchant
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            var url = idEdit ? "{{ route('merchants.update', ':id') }}" : "{{ route('merchants.store') }}";
            url = url.replace(':id', idEdit);
            var type = idEdit ? "PUT" : "POST";
            $.ajax({
                data: $('#formMerchants').serialize(),
                url: url,
                type: type,
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                        title: 'Success !',
                        icon: 'success',
                        showConfirmButton: true
                    })
                    $('#formMerchants').trigger('reset');
                    $('#modalMerchants').modal('hide');
                    $('#tableMerchants').DataTable().ajax.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
        // End Create and Update Merchant

        // Delete Merchant
        $('body').on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route("merchants.delete", ":id") }}';
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
        // End Delete Merchant
    });
</script>