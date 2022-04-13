<script>
$(document).ready(function(){
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

    $table = $('#classinfo_table').DataTable( {
      "processing": true,
      "serverSide": true,
      "bDestroy" : true,
      "ajax": {
        "url": "<?php echo base_url();?>ShareTransfer/get/",
        "type": "POST",
        "data" : function (d) {
          console.log(d);
        }
      },
      "createdRow": function ( row, data, index ) {
        $table.column(0).nodes().each(function(node,index,dt){
          $table.cell(node).data(index+1);
        });

        $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>index.php/District/edit/'+data['district_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['district_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
      },
      "columns": [
        { "data": "share_name", "orderable": false },
        { "data": "share_name", "orderable": false },
        { "data": "share_name", "orderable": false },
        { "data": "share_name", "orderable": false },
        { "data": "share_value", "orderable": false },
        { "data": "transfer_no_of_shares", "orderable": false },
        { "data": "transfer_share_total", "orderable": false },
        { "data": "share_name", "orderable": false }
      ]
    } );
  });
})
$('#fromSelect').on('change',function(){
  var shareholder_id=this.value;
  $.ajax({
    url:"<?php echo base_url();?>ShareTransfer/getSingleShareHolderShareDetais",
    data:{id:shareholder_id},
    method:"POST",
    datatype:"json",
    success:function(response){
      data=JSON.parse(response);
      console.log(data);
      if(data==false){
        alert('No shares availble')
      }
      else{
        $('#avlshareSelect').empty();
        var select=document.getElementById("avlshareSelect");
        data.forEach((item) => {
          $(select).append('<option value="'+item.share_id+'">'+item.share_name+' - Value : '+item.share_value+'</option>');
        });

        var share_id=$('#avlshareSelect').val();
        var shareholder_id=$('#fromSelect').val();
        $.ajax({
          url:"<?php echo base_url();?>ShareTransfer/getSingleShareTotal",
          data:{share_id:share_id,shareholder_id:shareholder_id},
          method:"POST",
          datatype:"json",
          success:function(response){
            data=JSON.parse(response);
            $('#avl_sharestock').val(data);
            // console.log(data);
          }
        });

      }
    }
  });
})

$('#avlshareSelect').on('change',function(){
  var share_id=this.value;
  var shareholder_id=$('#fromSelect').val();
  $.ajax({
    url:"<?php echo base_url();?>ShareTransfer/getSingleShareTotal",
    data:{share_id:share_id,shareholder_id:shareholder_id},
    method:"POST",
    datatype:"json",
    success:function(response){
      data=JSON.parse(response);
      $('#avl_sharestock').val(data);
    }
  });
})

$('#toSelect').on('change',function(){
  var from_id = $("#fromSelect").val();
  if(this.value==from_id){
    alert('Shareholders chose same. Please choose another !');
  }
})

$('#transfer_qty').on('keyup',function(){
  var qty=this.value;
  var avl=parseInt($('#avl_sharestock').val());
  if(qty>avl){
    alert('Available quantity is less than mentioned quantity!');
    $('#transfer_qty').val(0);
  }
})
</script>
