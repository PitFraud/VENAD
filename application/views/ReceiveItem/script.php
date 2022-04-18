<script type="text/javascript">
$table = $('#ReceivalTable').DataTable( {
  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>ReceiveItem/getReceivals",
    "type": "POST",
    "data" : function (d) {
      console.log(d);
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
      $('td', row).eq(11).html('<center><a href="<?php echo base_url();?>ReceiveItem/edit/'+data['rec_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['rec_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "product_name", "orderable": false },
    { "data": "member_name", "orderable": false },
    { "data": "member_type_name", "orderable": false },
    { "data": "rec_quantity", "orderable": false },
    { "data": "allot_dead_chicken_qty", "orderable": false },
    { "data": "rec_weight", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "rec_given_feeds_total", "orderable": false },
    { "data": "rec_fcr", "orderable": false },
    { "data": "updated_at", "orderable": false },
    { "data": "updated_at", "orderable": false },
  ]
});

$('#fcr_btn').click(function(){
  var allotment_id=$('#allotment_id').val();
  var quantity=$('#quantity').val();
  var weight=$('#weight').val();
  var unit=$('#unit').val();
  if(quantity==""){
    alert("Please enter quantity");
    return;
  }
  if(weight==""){
    alert("Please enter weight");
    return;
  }
  if(unit==""){
    alert("Please enter unit");
    return;
  }
  $.ajax({
  url: '<?php echo base_url(); ?>Feeds/getAllotedFeedDetails',
  type: 'post',
  data: {
    allotment_id:allotment_id
  },
  success: function(response){
    var data=JSON.parse(response);
    console.log(data);
    if(data.total_feed_given==null){
      var feed_conversion_ratio="No feeding given";
      $('#feeding_quantity').val(0);
    }
    else{
      var feed_conversion_ratio=parseFloat(quantity)/parseFloat(data.total_feed_given).toFixed(2);
      $('#feeding_quantity').val(data.total_feed_given);
    }
    $('#fcr').val(feed_conversion_ratio);
  }
});
})

$('#fcr_layer_btn').click(function(){
  var allotment_id=$('#allotment_id').val();
  var quantity=$('#quantity').val();
  var weight=$('#weight').val();
  var unit=$('#unit').val();
  if(quantity==""){
    alert("Please enter quantity");
    return;
  }
  if(weight==""){
    alert("Please enter weight");
    return;
  }
  if(unit==""){
    alert("Please enter unit");
    return;
  }
  $.ajax({
  url: '<?php echo base_url(); ?>Feeds/getAllotedFeedDetails',
  type: 'post',
  data: {
    allotment_id:allotment_id
  },
  success: function(response){
    var data=JSON.parse(response);
    console.log(data);
    if(data.total_feed_given==null){
      var feed_conversion_ratio="No feeding given";
      $('#feeding_quantity').val(0);
    }
    else{
      var feed_conversion_ratio=parseFloat(quantity)*parseFloat(data.total_feed_given).toFixed(2)*0.27;
      $('#feeding_quantity').val(data.total_feed_given);
    }
    $('#fcr_layers').val(feed_conversion_ratio);
  }
});
})

function confirmDelete(rec_id){
    var conf = confirm("Do you want to Delete Class ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>ReceiveItem/delete",
            data:{rec_id:rec_id},
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
$(document).ready(function(){
  $('#allotment_id').select2();
})

$('#allotment_id').on('change',function(){
  var allot_id = this.value;
  $.ajax({
            url:"<?php echo base_url();?>ReceiveItem/getIntegrationType",
            data:{allot_id:allot_id},
            method:"POST",
            datatype:"json",
            success:function(data){
                var response = JSON.parse(data);
                $('#integration_type_ids').val(response.allot_integration_type);
            }
        });
})

$('#fcr_broiler').on('click',function(){
  $('#fcr_broiler_type').show();
  $('#fcr_layer_type').hide();
})

$('#fcr_layer').on('click',function(){
  $('#fcr_broiler_type').hide();
  $('#fcr_layer_type').show();
})

</script>
