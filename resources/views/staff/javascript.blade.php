<script>
    $(document).ready(function() {
        // Var id Edit
        var idEdit = 0;

        // Initial Datatable
        // Show Data
        var table = $('#tableStaff').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('staff.data') }}",
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
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'address',
                    name: 'address'
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
        $('#addStaff').click(function() {
            idEdit = 0;
            $('#formStaff').trigger('reset');
            $('#modalStaff .modal-title').text("Add Staff");
            $('#modalStaff').modal('show');
        });
        // End Clear

        // Edit Staff
        $('body').on('click', '.edit', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route("staff.edit",":id") }}'
            url = url.replace(':id', id)
            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    console.log(res)
                    idEdit = res.data.id;
                    $('#modalStaff').trigger("reset");
                    $('#modalStaff .modal-title').text("Edit Staff");
                    $('#modalStaff').modal('show');
                    $('#name').val(res.data.name);
                    $('#email').val(res.data.email);
                    $('#phone').val(res.data.phone);
                    $('#address').val(res.data.address);
                }
            })
        });
        // End Edit

        // Create and Update Staff
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            var url = idEdit ? "{{ route('staff.update', ':id') }}" : "{{ route('staff.store') }}";
            url = url.replace(':id', idEdit);
            var type = idEdit ? "PUT" : "POST";
            $.ajax({
                data: $('#formStaff').serialize(),
                url: url,
                type: type,
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                        title: 'Success !',
                        icon: 'success',
                        showConfirmButton: true
                    })
                    $('#formStaff').trigger('reset');
                    $('#modalStaff').modal('hide');
                    $('#tableStaff').DataTable().ajax.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
        // End Create and Update Staff

        // Delete Staff
        $('body').on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var url = '{{ route("staff.delete", ":id") }}';
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
        // End Delete Staff
    });
</script>