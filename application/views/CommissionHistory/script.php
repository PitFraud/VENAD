<script>
$(document).ready(function(){
  $table = $('#classinfo_table').DataTable( {
    "processing": true,
    "serverSide": true,
    "bDestroy" : true,
    "ajax": {
      "url": "<?php echo base_url();?>CommissionHistory/get/",
      "type": "POST",
      "data" : function (d) {
      }
    },
    "createdRow": function ( row, data, index ) {
      console.log(data);
      $table.column(0).nodes().each(function(node,index,dt){
        $table.cell(node).data(index+1);
      });

      $('td', row).eq(2).html('<center>'+data['product_name']+' - '+data['allot_weight']+''+data['unit_name']+'</center>');
      if(data['history_status']==1){
        $('td', row).eq(5).html('<center>Generated</center>');
      }
    },
    "columns": [
      { "data": "member_name", "orderable": false },
      { "data": "member_name", "orderable": false },
      { "data": "product_name", "orderable": false },
      { "data": "allot_date", "orderable": false },
      { "data": "history_commission_amount", "orderable": false },
      { "data": "history_status", "orderable": false }
    ]
});
})
function confirmDelete(district_id){
  var conf = confirm("Do you want to Delete Class ?");
  if(conf){
    $.ajax({
      url:"<?php echo base_url();?>District/delete",
      data:{district_id:district_id},
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
