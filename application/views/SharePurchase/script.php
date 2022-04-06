<script type="text/javascript">
$table = $('#sharePurchaseTable').DataTable( {
  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>SharePurchase/getSharePurchase",
    "type": "POST",
    "data" : function (d) {
    }
  },

  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>Vaccination/edit/'+data['vaccination_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['vaccination_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },

  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "purchase_shareholder_name", "orderable": false },
    { "data": "share_name", "orderable": false },
    { "data": "share_purchase_paid", "orderable": false },
    { "data": "share_purchase_patronage_divident", "orderable": false },
    { "data": "created_date", "orderable": false },
    { "data": "share_id", "orderable": false },
  ]

} );

function confirmDelete(share_id){
   var conf = confirm("Do you want to Delete Share Details ?");
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

