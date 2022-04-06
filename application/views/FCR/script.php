<script type="text/javascript">

$table = $('#FCRTable').DataTable( {
  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>FCR/getFeedConvertionRatioDetails",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    console.log(data);
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    $('td', row).eq(4).html('<center>'+data['allot_weight']+' - '+data['unit_name']+'</center>');
    $('td', row).eq(6).html('<center>'+data['total_feeds_given']+' - '+data['unit_name']+'</center>');
    $('td', row).eq(8).html('<center>'+data['rec_weight']+' - '+data['unit_name']+'</center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "member_name", "orderable": false },
    { "data": "product_name", "orderable": false },
    { "data": "rec_fcr", "orderable": false },
    { "data": "allot_quantity", "orderable": false },
    { "data": "allot_weight", "orderable": false },
    { "data": "total_feeds_given", "orderable": false },
    { "data": "rec_quantity", "orderable": false },
    { "data": "rec_weight", "orderable": false },
    { "data": "alloted_date", "orderable": false },
    { "data": "receival_date", "orderable": false },
    // { "data": "rec_fcr", "orderable": false },
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
