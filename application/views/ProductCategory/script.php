<script>
var k = new Date();
var n = k.toString();
var c=n.substr(0,34);
var d=c+"(IST)";
$('#date').html(d);
var response = $("#response").val();
if(response){
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}

$(function () {

  var enquiry_type = {'J':'Job','C':'Complaint','F':'Follow-up'};
  //Datemask dd/mm/yyyy
  $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  //Date picker
  $('#date').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy'
  });


  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
  });

  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

  $table = $('#classinfo_table').DataTable( {
    "processing": true,
    "serverSide": true,
    "bDestroy" : true,
    "ajax": {
      "url": "<?php echo base_url();?>Product/get/",
      "type": "POST",
      "data" : function (d) {
        d.item_name = $('#item_names').val();
      }
    },
    "createdRow": function ( row, data, index ) {

      //            $('td',row).eq(0).html(index+1);
      $table.column(0).nodes().each(function(node,index,dt){
        $table.cell(node).data(index+1);
      });

      $('td', row).eq(0).css( "font-weight", "bold");
      $('td', row).eq(0).css( "text-align", "center" );

      $('td', row).eq(1).css( "font-weight", "bold");


      $('td', row).eq(2).css( "font-weight", "bold" );
     // $('td', row).eq(2).css( "text-align", "center" );

      $('td', row).eq(3).css( "font-weight", "bold" );

      $('td', row).eq(3).css( "text-align", "center" );


      $('td', row).eq(4).css( "font-weight", "bold" );
      $('td', row).eq(4).css( "text-align", "center" );

      $('td', row).eq(5).css( "font-weight", "bold" );
      $('td', row).eq(5).css( "text-align", "center" );

      $('td', row).eq(6).css( "font-weight", "bold" );
      $('td', row).eq(6).css( "text-align", "center" );

      $('td', row).eq(7).css( "font-weight", "bold" );
      $('td', row).eq(7).css( "text-align", "center" );

       if(data['product_type']==1)
           {
            $('td', row).eq(1).html('<b style="font-weight:bold;color:red;">Chicks</b>');
           }
            else if(data['product_type']==2)
           {
            $('td', row).eq(1).html('<b style="font-weight:bold;color:#b53b0f;">Poultry Equipment</b>');
           }

             else if(data['product_type']==3)
           {
            $('td', row).eq(1).html('<b style="font-weight:bold;color:blue;">Chicken Vaccines</b>');
           }

               else if(data['product_type']==4)
           {
            $('td', row).eq(1).html('<b style="font-weight:bold;color:#1d8f40;">Medicines</b>');
           }


              else if(data['product_type']==5)
           {
            $('td', row).eq(1).html('<b style="font-weight:bold;color:green;">Poultry Feed</b>');
           }




     $('td', row).eq(9).html('<center><a href="<?php echo base_url();?>index.php/Product/edit/'+data['product_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['product_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
    },

    "columns": [
      { "data": "product_status", "orderable": false },
      { "data": "product_type", "orderable": false },
      { "data": "product_name", "orderable": false },
      { "data": "product_code", "orderable": false },
      { "data": "unit_name", "orderable": false },
      { "data": "product_open_stock", "orderable": false },
      { "data": "product_stock", "orderable": false },
      { "data": "min_stock", "orderable": false },
      { "data": "product_updated_date", "orderable": false },
      { "data": "product_status", "orderable": false }

    ]

  } );


});

function confirmDelete(product_id){
  var conf = confirm("Do you want to Delete Class ?");
  if(conf){
    $.ajax({
      url:"<?php echo base_url();?>Product/delete",
      data:{product_id:product_id},
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
$('#search').click(function () {
    $table.ajax.reload();
});
</script>
