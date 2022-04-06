<script type="text/javascript">

$table = $('#feedStockTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>FeedPurchase/getFeedPurchaseDetails",
    "type": "POST",
    "data" : function (d) {
      console.log(d);
    }
  },
  "createdRow": function ( row, data, index ) {

    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    // $('td', row).eq(9).html('<center><a href="<?php echo base_url();?>Vaccination/edit/'+data['vaccination_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['vaccination_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');

     $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>FeedPurchase/getinvoice/'+data['purchase_id']+'"><i class="fa fa-file iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "feed_name", "orderable": false },
    { "data": "purchase_vendor_name", "orderable": false },
    { "data": "purchase_quantity", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "purchase_price", "orderable": false },
    { "data": "purchase_total_cost", "orderable": false },
    { "data": "purchase_date", "orderable": false },
    { "data": "purchase_id", "orderable": false }
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

     $(document).on('click','#print', function(){
     var divContents = $("#invcontent").html();
    window.print();
   });

</script>
