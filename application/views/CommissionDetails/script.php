<script type="text/javascript">

$table = $('#commissionDetailsTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>CommissionDetails/getReceivals",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    console.log(data);
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });

    if(data['commission_amount']!=0){
        $('td', row).eq(11).html('<center><button class="btn btn-primary" data-member-id='+data['rec_allotment_fk']+' data-id='+data['rec_id']+' disabled>Add Commission</button>');
    }
    else{
        $('td', row).eq(11).html('<center><button class="btn btn-primary" data-allot-id='+data['allot_id']+'  data-member-id='+data['member_id']+' data-id='+data['rec_id']+' onclick="showModal(this)">Add Commission</button>');
    }
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "member_name", "orderable": false },
    { "data": "product_name", "orderable": false },
    { "data": "member_type_name", "orderable": false },
    { "data": "rec_quantity", "orderable": false },
    { "data": "rec_weight", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "rec_given_feeds_total", "orderable": false },
    { "data": "rec_fcr", "orderable": false },
    { "data": "commission_amount", "orderable": false },
    { "data": "updated_at", "orderable": false },
    { "data": "updated_at", "orderable": false },
  ]
} );

function showModal(data){
  var member_id=data.getAttribute('data-member-id');
  var allot_id=data.getAttribute('data-allot-id');
  $.ajax({
  url: '<?php echo base_url(); ?>Commission/getCommissions',
  type: 'post',
  data: {
    member_id:member_id,
    allot_id:allot_id,
  },
  success: function(response){
    $('#rec_id').val(data.getAttribute('data-id'));
    $('#member_id').val(member_id);
    $('#allot_id').val(allot_id);
    $('#exampleModal').modal('show');
  }
});
}

</script>
