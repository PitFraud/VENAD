<script type="text/javascript">
$table = $('#IntegratedStockList').DataTable( {
  "processing": true,
  "serverSide": true,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>IntegrationDetails/get",
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
  },
  "columns": [
    { "data": "member_name", "orderable": false },
    { "data": "member_name", "orderable": false },
    { "data": "product_name", "orderable": false },
    { "data": "allot_integration_type", 'render': function (data, type, full, meta) {
        if(data == 1){
            return 'Broiler';
        }
        else if(data == 2)
        {
            return 'Layer';
        }
    } 
    },
    { "data": "allot_quantity", "orderable": false },
    { "data": "allot_weight", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "allot_status", 'render': function (data, type, full, meta) {
        if(data == 0){
            return '<button class="btn btn-warning btn-sm">Pending</button>';
        }
        else if(data == 1)
        {
            return '<button class="btn btn-success btn-sm">Alloted</button>';
        }
        else if(data == 2)
        {
            return '<button class="btn btn-primary btn-sm">Integrated</button>';
        }
    } 
    },
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
</script>
