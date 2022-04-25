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
    $('td', row).eq(14).html('<center><button class="btn btn-primary" data-id='+data['production_id']+' onclick="viewQR(this);">View QR</button></center>');
    $('td', row).eq(15).html('<center><button class="btn btn-primary" data-id='+data['production_id']+' onclick="viewBarcode(this);">View Barcode</button></center>');
    $('td', row).eq(16).html('<center><a href="<?php echo base_url();?>/ProductManagement/editProductionDetails/'+data['production_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['production_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "item_name", "orderable": false },
    { "data": "production_code", "orderable": false },
    { "data": "production_mfd", "orderable": false },
    { "data": "production_expiry", "orderable": false },
    { "data": "production_chicken_type", "render" : function(data,type,row,meta){
      if(data == 1){
        return 'Broiler';
      }else if(data == 2){
        return 'Layer';
      }
    } },
    { "data": "production_quantity", "orderable": false },
    { "data": "production_row_mat_count", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "production_packet_count", "orderable": false },
    { "data": "production_price", "orderable": false },
    
    { "data": "production_chicken_old_stock", "orderable": false },
    { "data": "production_chicken_new_bal", "orderable": false },
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

  $('#item_list').on('change',function(){
    var item_id = this.value;
    $.ajax({
            url:"<?php echo base_url();?>ProductManagement/getStockValue",
            data:{item_id:item_id},
            method:"POST",
            datatype:"json",
            success:function(response){
              var data = JSON.parse(response);
              console.log(data);
              var html = data.item_name+' Stock Qty: '+data.item_quantity+'';
              $('#stock_listss').html(html);
            }
        });
  })

  $('#chicken_weight_count').on('change',function(){
    var waste_qty = "";
    var total_chicken_qty = this.value;
    var raw_chicken_used = $('#row_mat_count').val();
    if(raw_chicken_used != ""){
      waste_qty = total_chicken_qty - raw_chicken_used;
    }
    else
    {
      raw_chicken_used = 0;
      waste_qty = 0;
    }
    $('#prod_waste').val(waste_qty);
  })

  $('#row_mat_count').on('change',function(){
    var waste_qty = "";
    var raw_chicken_used = this.value;
    var total_chicken_qty = $('#chicken_weight_count').val();
    if(total_chicken_qty != ""){
      waste_qty = total_chicken_qty - raw_chicken_used;
    }
    else
    {
      total_chicken_qty = 0;
      waste_qty = 0;
    }
    $('#prod_waste').val(waste_qty);
  })
  $('#chicken_type').on('change',function(){
    var chicken_type = this.value;
    $.ajax({
            url:"<?php echo base_url();?>ProductManagement/getChickenWeightQty",
            data:{chicken_type:chicken_type},
            method:"POST",
            datatype:"json",
            success:function(response){
              var data = JSON.parse(response);
              console.log(data);
              $('#current_weights').val(data.integration_stock_weight);
            }
        });
  })
</script>
