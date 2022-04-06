<script type="text/javascript">

$table = $('#distributionTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Stock/getStockDetails",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    
   
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "product_name", "orderable": false },
    { "data": "old_stock", "orderable": false },
    { "data": "purchase_quantity", "orderable": false },
    { "data": "product_stock", "orderable": false },
    { "data": "allot_quantity", "orderable": false },
    { "data": "rec_quantity", "orderable": false },
    { "data": "rec", "orderable": false },
    { "data": "balance", "orderable": false }
  ]
} );

$('#memberTypeSelect').on('change', function() {
  $('#memberSelect').empty();
  var id=this.value;
  $.ajax({
    url: '<?php echo base_url(); ?>Allotment/getMembersWhere',
    type: 'post',
    data: {
      id:id
    },
    success: function(response){
      var data = JSON.parse(response);
      var dataset = data;
      var select=document.getElementById("memberSelect");
      dataset.forEach((item) => {
          $(select).append('<option value="'+item.member_id+'">'+item.member_name+'</option>');
      });
    }
  });
});


</script>
