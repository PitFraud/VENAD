<script type="text/javascript">
$table = $('#productionItemsTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>ProductManagement/getProductionItems",
    "type": "POST",
    "data" : function (d) {
      console.log(d);
    }
  },
  "createdRow": function ( row, data, index ) {
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    // $('td', row).eq(3).html('<center><button class="btn btn-primary">Edit</button><button class="btn btn-danger">Remove</button></center>');
    $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>/ProductManagement/edit/'+data['item_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['item_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "item_name", "orderable": false },
    { "data": "product_code", "orderable": false },
    { "data": "created_at", "orderable": false },
    { "data": "item_id", "orderable": false },
  ]
} );

$table1 = $('#productionDetailsTable').DataTable( {

  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>ProductManagement/getProductionDetails",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {
    console.log(data);
    $table1.column(0).nodes().each(function(node,index,dt){
      $table1.cell(node).data(index+1);
    });
    $('td', row).eq(10).html('<center><button class="btn btn-primary" data-id='+data['production_id']+' onclick="viewQR(this);">View QR</button></center>');
    $('td', row).eq(11).html('<center><button class="btn btn-primary" data-id='+data['production_id']+' onclick="viewBarcode(this);">View Barcode</button></center>');

    $('td', row).eq(12).html('<center><a href="<?php echo base_url();?>/ProductManagement/editProductionDetails/'+data['production_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['production_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "item_name", "orderable": false },
    { "data": "production_code", "orderable": false },
    { "data": "production_mfd", "orderable": false },
    { "data": "production_expiry", "orderable": false },
    { "data": "production_quantity", "orderable": false },
    { "data": "production_row_mat_count", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "production_price", "orderable": false },
    // { "data": "production_qr", render : function (data, type, full, meta){
    //   return '<img src="data:image/png;base64,'+data+'" height="30%" width="50%">'; }
    // },
    { "data": "created_date", "orderable": false },
    { "data": "production_id", "orderable": false },
    { "data": "production_id", "orderable": false },
    { "data": "production_id", "orderable": false },
  ]
} );

function viewQR(data){
  var id=data.getAttribute('data-id');
  $.ajax({
    url: '<?php echo base_url(); ?>ProductManagement/getSingleProductionDetails',
    type: 'post',
    data: {
      id:id
    },
    success: function(response){
      var data=JSON.parse(response);
      console.log(data);
      // alert(data.production_qr);
      $("#qr_image").attr("src","data:image/png;base64,"+data.production_qr+"");
      $('#showQrModal').modal('show');
    }
  });
}

function viewBarcode(data){
  var id=data.getAttribute('data-id');
  $.ajax({
    url: '<?php echo base_url(); ?>ProductManagement/getSingleProductionDetails',
    type: 'post',
    data: {
      id:id
    },
    success: function(response){
      var data=JSON.parse(response);
      console.log(data);
      // alert(data.production_qr);
      $("#barcode_image").attr("src","data:image/png;base64,"+data.production_barcode+"");
      $('#showBarcodeModal').modal('show');
    }
  });
}

function confirmDelete(item_id){
    var conf = confirm("Do you want to Delete Item ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>ProductManagement/delete",
            data:{item_id:item_id},
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
