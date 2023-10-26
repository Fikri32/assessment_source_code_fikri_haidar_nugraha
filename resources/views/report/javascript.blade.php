<script>
  $(document).ready(function() {
    // Initial Select 2
    $('#filterMerchant').select2({
      theme: 'bootstrap4',
    });
    // Set Select 2 Merchant
    $("#filterMerchant").append('<option value="">Choose Merchant</option>');
    $.ajax({
      url: "{{ route('transactions.getRelationalData') }}",
      type: 'GET',
      success: function(res) {

        $.each(res.merchant, function(key, value) {
          $("#filterMerchant").append('<option value="' + value.name + '">' + value.name + '</option>');
        });

      }
    })
    // End Set Merchant


    $('#filterOutlet').select2({
      theme: 'bootstrap4',
    });
    // Set Select 2 Outlet
    $("#filterOutlet").append('<option value="">Choose Outlet</option>');
    $.ajax({
      url: "{{ route('transactions.getRelationalData') }}",
      type: 'GET',
      success: function(res) {

        $.each(res.outlet, function(key, value) {
          $("#filterOutlet").append('<option value="' + value.name + '">' + value.name + '</option>');
        });
      }
    })
    // End Set Outlet
    // Initial Datatable
    // Show Data
    var table = $('#tableTransactions').DataTable({
      processing: true,
      fixedHeader: true,
      serverSide: true,
      scrollX: true,
      dom: 'lBfrtip',
      buttons: [{
        extend: 'csv',
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
          rows: function(idx, data, node) {
            return data.payment_status === 'Paid' ?
              true : false;
          }
        },
      }],
      ajax: "{{ route('report.getReportTransaction') }}",
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
      ]
    });
    // Inisialisasi FixedHeader
    new $.fn.dataTable.FixedHeader(table);

    // Filter By Date
    $('#filterDate').on('change', function() {
      var inputDate = this.value;
      var searchDate = inputDate.split('-').reverse().join('-');
      table.column(3).search(searchDate).draw();
    });
    // Filter Merchant
    $('#filterMerchant').on('change', function() {
      table.column(1).search(this.value).draw();
      console.log(this.value)
    });
    // Filter Payment Status
    $('#filterPaymentStatus').on('change', function() {
      var selectedValue = $(this).val();

      // Update nilai filter berdasarkan "Payment Status"
      if (selectedValue === 'Paid') {
        table.column(12).search('^Paid$', true, false).draw();
      } else if (selectedValue === 'Not Paid') {
        table.column(12).search('^Not Paid$', true, false).draw();
      } else {
        // Jika "All" dipilih, bersihkan filter Payment Status
        table.column(12).search('').draw();
      }
    });
    // Filter Outlet
    $('#filterOutlet').on('change', function() {
      table.column(2).search(this.value).draw();
    });
    // End Initial Datatable

    // BarCharts

    var ctx = document.getElementById('barChart').getContext('2d');

    var months = @json($months); // Ambil data bulan dari controller
    var counts = @json($counts); // Ambil data jumlah transaksi dari controller

    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
          label: 'Total Transaction Per Month',
          data: counts,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Jumlah Transaksi'
            }
          },
          x: {
            title: {
              display: true,
              text: 'Bulan'
            }
          }
        }
      }
    });


  });
</script>