<script type="text/javascript">

$table = $('#commissionTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Commission/getCommissions",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    $('td', row).eq(5).html('<center><a href="<?php echo base_url();?>Commission/edit/'+data['commission_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['panchayath_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "commission_name", "orderable": false },
    { "data": "commission_amount", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "commission_date", "orderable": false },
    { "data": "commission_name", "orderable": false },
  ]
} );
</script>
