<script type="text/javascript">
$table = $('#scheduleTable').DataTable( {
"processing": true,
"serverSide": false,
"bDestroy" : true,
"ajax": {
  "url": "<?php echo base_url();?>VaccinationSchedule/get",
  "type": "POST",
  "data" : function (d) {
  }
},
"createdRow": function ( row, data, index ) {
  $table.column(0).nodes().each(function(node,index,dt){
    $table.cell(node).data(index+1);
  });
  if(data['schedule_status']=="0"){
      $('td', row).eq(6).html('<center style="color:black;">Pending</center>');
  }
  else if(data['schedule_status']=="1"){
    $('td', row).eq(6).html('<center style="color:green;">Completed</center>');
  }
  else{
    $('td', row).eq(6).html('<center style="color:orange;">Partial</center>');
  }

    $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>VaccinationSchedule/getreceipt/'+data['schedule_id']+'"><i class="fa fa-file iconFontSize-medium" ></i></a></center>');

  $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>VaccinationSchedule/edit/'+data['schedule_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['schedule_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');

},
"columns": [
  { "data": "empty", "defaultContent":""},
  { "data": "member_name", "orderable": false },
  { "data": "vaccination_name", "orderable": false },
  { "data": "schedule_vaccine_dose", "orderable": false },
  { "data": "schedule_vaccine_total_dose", "orderable": false },
  { "data": "schedule_vaccine_date", "orderable": false },
  { "data": "schedule_status", "orderable": false },
   { "data": "schedule_id", "orderable": false },
  { "data": "schedule_id", "orderable": false }
]
} );
</script>
