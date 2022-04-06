<script type="text/javascript">

$table = $('#vehicleTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Vehicles/getVehicles",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    if(data['vehicle_sec_or_aux']==0){
      $('td', row).eq(14).html('<center>Secondary</center>');
    }
    else{
        $('td', row).eq(14).html('<center>Auxilary</center>');
    }
    $('td', row).eq(15).html('<center><a href="<?php echo base_url();?>Vehicles/edit/'+data['vehicle_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['vehicle_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "vehicle_image",
          "render": function (data, type, full, meta){
              return "<img src=\"<?php echo base_url() ?>Images/Vehicles/"+ data + "\" height=\"40\"  width=\"60\"/>";
    }},
    { "data": "type_name", "orderable": false },
    { "data": "vehicle_reg_no", "orderable": false },
    { "data": "vehicle_name", "orderable": false },
    { "data": "vehicle_engine_number", "orderable": false },
    { "data": "vehicle_make_model", "orderable": false },
    { "data": "vehicle_chassis_number", "orderable": false },
    { "data": "vehicle_year_of_mfd", "orderable": false },
    { "data": "vehicle_fuel_type", "orderable": false },
    { "data": "vehicle_color", "orderable": false },
    { "data": "vehicle_fuel_mesurement", "orderable": false },
    { "data": "vehicle_track_usage", "orderable": false },
    { "data": "group_name", "orderable": false },
    { "data": "vehicle_sec_or_aux", "orderable": false },
    { "data": "vehicle_image", "orderable": false },
  ]
} );
function confirmDelete(vaccination_id){
   var conf = confirm("Do you want to Delete Vaccination Details ?");
   if(conf){
       $.ajax({
           url:"<?php echo base_url();?>Vaccination/delete",
           data:{vaccination_id:vaccination_id},
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
