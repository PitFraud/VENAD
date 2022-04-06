<script type="text/javascript">

$table = $('#feedsTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Feeds/getFeedsDetails",
    "type": "POST",
    "data" : function (d) {
      console.log(d);
    }
  },
  "createdRow": function ( row, data, index ) {

    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    $('td', row).eq(2).html('<center>'+data['member_name']+' - '+data['product_name']+'</center>');
    $('td', row).eq(9).html('<center><a href="<?php echo base_url();?>Feeds/edit/'+data['feeds_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['feeds_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "feed_name", "orderable": false },
    { "data": "member_name", "orderable": false },
    { "data": "feeds_distribution_date", "orderable": false },
    { "data": "feeds_date", "orderable": false },
    { "data": "feeds_details", "orderable": false },
    { "data": "feeds_quantity", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "created_date", "orderable": false },
    { "data": "feeds_allotment_fk", "orderable": false },
  ]
} );
function confirmDelete(feeds_id){
   var conf = confirm("Do you want to Delete Vaccination Details ?");
   if(conf){
       $.ajax({
           url:"<?php echo base_url();?>Feeds/delete",
           data:{feeds_id:feeds_id},
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
