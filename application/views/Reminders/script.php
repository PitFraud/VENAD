<script type="text/javascript">
$table = $('#reminderTable').DataTable( {
  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Reminders/getReminders",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    // console.log(data['beforetwodays']);
    // var today=new Date();
    // var beforedate=new Date(data['beforetwodays']);
    // if(beforedate <= today){
    //   $('td', row).eq(3).html('<center><b><p style="color:red;">'+data['reminder_date']+'</p></b></center>');
    // }
    // else{
    //   $('td', row).eq(3).html('<center><p">'+data['reminder_date']+'</p></center>');
    // }
    $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>Reminders/edit/'+data['reminder_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['reminder_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
    if(data['reminder_status']==0){
      $('td', row).eq(6).html('<center><b><p style="color:orange;">Closed</p></b></center>');
    }
    else{
      $('td', row).eq(6).html('<center><b><p style="color:green;">Active</p></b></center>');
    }
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "reminder_title", "orderable": false },
    { "data": "reminder_description", "orderable": false },
    { "data": "reminder_date", "orderable": false },
    { "data": "reminder_broadcast_time", "orderable": false },
    { "data": "reminder_no_of_times", "orderable": false },
    { "data": "reminder_status", "orderable": false },
    { "data": "empty", "defaultContent":"" },
  ]
} );
function confirmDelete(reminder_id){
   var conf = confirm("Do you want to Delete Reminder Details ?");
   if(conf){
       $.ajax({
           url:"<?php echo base_url();?>Reminders/delete",
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
   function onTimeChange() {
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  alert(hours + ':' + minutes + ' ' + meridian);
}
</script>
