<script type="text/javascript">

$table = $('#driversTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Drivers/getDrivers",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {

    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>Drivers/edit/'+data['driver_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['driver_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    // { "data": "driver_image", "orderable": false },
    { "data": "driver_image",
          "render": function (data, type, full, meta){
              return "<img src=\"<?php echo base_url() ?>Images/Drivers/"+ data + "\" height=\"40\"  width=\"60\"/>";
    }},
    { "data": "driver_name", "orderable": false },
    { "data": "driver_license_no", "orderable": false },
    { "data": "driver_email", "orderable": false },
    { "data": "driver_mobile", "orderable": false },
    { "data": "driver_address", "orderable": false },
    { "data": "driver_id", "orderable": false },
  ]
} );
function confirmDelete(driver_id){
   var conf = confirm("Do you want to Delete Driver Details ?");
   if(conf){
       $.ajax({
           url:"<?php echo base_url();?>Drivers/delete",
           data:{driver_id:driver_id},
           method:"POST",
           datatype:"json",
           success:function(data){
               var options = $.parseJSON(data);
               noty(options);
               $table.ajax.reload();
           }
       });

   }
   }
</script>
