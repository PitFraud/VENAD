<script type="text/javascript">
$(document).ready(function() {
  $table = $('#sharePurchaseTable').DataTable( {
    "processing": true,
    "serverSide": false,
    "bDestroy" : true,
    "ajax": {
      "url": "<?php echo base_url();?>SharePurchase/getSharePurchase",
      "type": "POST",
      "data" : function (d) {
        console.log(d);
      }
    },

    "createdRow": function ( row, data, index ) {
      $table.column(0).nodes().each(function(node,index,dt){
        $table.cell(node).data(index+1);
      });
      $('td', row).eq(10).html('<center><a href="<?php echo base_url();?>SharePurchase/editSharePurchase/'+data['purchase_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['purchase_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
      if(data['settings_period_type']==1){ var x = 'Months'} else{ var x = 'Day(s)'}
      $('td', row).eq(3).html('<center>'+data['settings_share_period']+' - '+x+'</center>');
    },

    "columns": [
      { "data": "empty", "defaultContent":""},
      { "data": "member_name", "orderable": false },
      { "data": "share_name", "orderable": false },
      { "data": "settings_share_period", "orderable": false },
      { "data": "share_value", "orderable": false },
      { "data": "settings_divident_percent", "orderable": false },
      { "data": "purchase_qty", "orderable": false },
      { "data": "purchase_total", "orderable": false },
      { "data": "purchase_payment", "orderable": false },
      { "data": "created_date", "orderable": false },
      { "data": "created_date", "orderable": false },
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
});

$('#shareSelect').on('change',function(){
  var share_id=this.value;
  $.ajax({
    url:"<?php echo base_url();?>SharePurchase/getSingleShareDetails",
    data:{share_id:share_id},
    method:"POST",
    datatype:"json",
    success:function(response){
      data=JSON.parse(response)
      $('#share_value').val(data.share_value);
      $('#divident_percent').val(data.settings_divident_percent);
      if(data.settings_period_type==1){ var x = "Months"}else { var x="Days" }
      $('#period').val(data.settings_share_period+' - '+x+'');
    }
  });
})

$('#share_qty').on('keyup',function(){
  var qty=parseInt(this.value);
  var value=parseInt($('#share_value').val());
  $('#total_amount').val(qty*value);
})
</script>
