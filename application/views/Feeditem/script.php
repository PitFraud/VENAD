<script type="text/javascript">

$table = $('#feedsTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Feeditem/getFeedsDetails",
    "type": "POST",
    "data" : function (d) {
      console.log(d);
    }
  },
  "createdRow": function ( row, data, index ) {

    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>Feeditem/edit/'+data['feed_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['feed_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "feed_status", "orderable": false },
    { "data": "feed_name", "orderable": false },
    { "data": "feed_code", "orderable": false },
    { "data": "feed_id", "orderable": false },
  ]
} );
function confirmDelete(feed_id){
   var conf = confirm("Do you want to Delete Item Details ?");
   if(conf){
       $.ajax({
           url:"<?php echo base_url();?>Feeditem/delete",
           data:{feed_id:feed_id},
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
