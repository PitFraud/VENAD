<script>
var response = $("#response").val();
if(response){
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$(function () {
  $table = $('#allotment_report_table').DataTable( {
    "searching": false,
    "processing": true,
    "serverSide": true,
    "bDestroy" : true,
    "paging":   false,
    "ordering": false,
    "info":     false,
    dom: 'lBfrtip',
    buttons: [
      {
        title:'Purchase Report',
        extend: 'copy',
        exportOptions: {
          columns: [ 0,1,2,3,4,5,6,7,8,9]
        }
      },
      {
        title:'Purchase Report',
        extend: 'excel',
        exportOptions: {
          columns: [ 0,1,2,3,4,5,6,7,8,9]
        }
      },
      {
        title:'Purchase Report',
        extend: 'pdf',
        exportOptions: {
          columns: [ 0,1,2,3,4,5,6,7,8,9]
        }
      },
      {
        title:'Purchase Report',
        extend: 'print',
        exportOptions: {
          columns: [ 0,1,2,3,4,5,6,7,8,9]
        }
      },
    ],
    "ajax": {
      "url": "<?php echo base_url();?>Allotment_report/get/",
      "type": "POST",
      "data" : function (d) {
      }
    },
    "createdRow": function ( row, data, index ) {
      $table.column(0).nodes().each(function(node,index,dt){
        $table.cell(node).data(index+1);
      });
    },
    "columns": [
      { "data": "empty", "defaultContent":""},
      { "data": "product_name", "orderable": false },
      { "data": "member_name", "orderable": false },
      { "data": "member_type_name", "orderable": false },
      { "data": "allot_quantity", "orderable": false },
      { "data": "allot_weight", "orderable": false },
      { "data": "unit_name", "orderable": false },
      { "data": "vaccination_name", "orderable": false },
      { "data": "vaccination_date", "orderable": false },
      { "data": "allotment_date", "orderable": false },
    ]
  } );
});
</script>
