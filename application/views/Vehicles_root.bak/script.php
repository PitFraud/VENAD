<script type="text/javascript">

$table = $('#vehicleTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Vehicles_root/getVehicles_root",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>Vehicles_root/edit/'+data['root_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['root_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "vehicle_name", "orderable": false },
    { "data": "driver_name", "orderable": false },
    { "data": "date", "orderable": false },
    { "data": "vehicle_name", "orderable": false },
  ]
} );
function confirmDelete(root_id){
   var conf = confirm("Do you want to Delete Root Map Details ?");
   if(conf){
       $.ajax({
           url:"<?php echo base_url();?>Vehicles_root/delete",
           data:{root_id:root_id},
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
