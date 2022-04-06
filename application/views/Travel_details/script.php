<script type="text/javascript">

$table = $('#vehicleTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>TravelDetails/getTravelDetails",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    $('td', row).eq(11).html('<center><a href="<?php echo base_url();?>Vaccination/edit/'+data['vaccination_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['vaccination_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "vehicle_name", "orderable": false },
    { "data": "driver_name", "orderable": false },
    { "data": "travel_date", "orderable": false },
    { "data": "travel_start_km", "orderable": false },
    { "data": "travel_end_km", "orderable": false },
    { "data": "travel_total_km", "orderable": false },
    { "data": "travel_root_details", "orderable": false },
    { "data": "travel_fuel", "orderable": false },
    { "data": "travel_fuel_cost", "orderable": false },
    { "data": "travel_other_exp", "orderable": false },
    { "data": "travel_other_exp", "orderable": false },
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
