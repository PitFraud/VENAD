<script>
  var response = $("#response").val();
  if (response) {
    console.log(response, 'response');
    var options = $.parseJSON(response);
    noty(options);
  }
  $(function() {
    $("#productnum option:first").before('<option value="">--Please Select--</option>');
    $("#productnum").val("").change();
    $(".select2").select2();
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {
      "placeholder": "dd/mm/yyyy"
    });
    //Date picker
    $('#date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    $table = $('#allotment_chart').DataTable({
      "searching": false,
      "processing": true,
      "serverSide": false,
      "bDestroy": true,
      "paging": false,
      "ordering": false,
      "info": false,
      dom: 'lBfrtip',
      buttons: [{
          title: 'Feed Chart Report',
          extend: 'copy',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
          }
        },
        {
          title: 'Feed Chart Report',
          extend: 'excel',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
          }
        },
        {
          title: 'Feed Chart Report',
          extend: 'pdf',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
          }
        },
        {
          title: 'Feed Chart Report',
          extend: 'print',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
          }
        },
        {
            title: 'Feed Chart Report',
            extend: 'csv',
            exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
        }
        },
      ],
      "ajax": {
        "url": "<?php echo base_url(); ?>Allotment_integration_report/get/",
        "type": "POST",
        "data": function(d) {
            console.log(d);
          d.start_date = $("#pmsDateStart").val();
          d.end_date = $("#pmsDateEnd").val();
        }
      },
      "createdRow": function(row, data, index) {
        $table.column(0).nodes().each(function(node, index, dt) {
          $table.cell(node).data(index + 1);
        });
        
      },
      "columns": [{
          "data": "allot_status",
          "orderable": false
        },
        {
          "data": "feed_consumption",
          "orderable": false
        },
        {
          "data": "feed_consumption",
          "orderable": false
        },
        {
          "data": "body_weight_ratio",
          "orderable": false
        },
        {
          "data": "body_weight_kg",
          "orderable": false
        },
      ]
    });
    $('#product').keyup(function() {
      $table.ajax.reload();
    });
  });
  $('#search').click(function() {
    $table.ajax.reload();
  });
</script>