<script type="text/javascript">
$table = $('#ReceivalTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>ReceiveItem/getpback",
    "type": "POST",
    "data" : function (d) {
      console.log(d);
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    // $('td', row).eq(8).html('<center><button class="btn btn-primary">Edit</button><button class="btn btn-danger">Remove</button></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "product_name", "orderable": false },
    { "data": "member_type_name", "orderable": false },
    { "data": "rec_quantity", "orderable": false },
    { "data": "rec_weight", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "rec_given_feeds_total", "orderable": false },
    { "data": "rec_fcr", "orderable": false },
    { "data": "updated_at", "orderable": false },
  ]
} );

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


</script>
