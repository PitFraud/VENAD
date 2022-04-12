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
function confirmDelete(district_id){
  var conf = confirm("Do you want to Delete Class ?");
  if(conf){
    $.ajax({
      url:"<?php echo base_url();?>District/delete",
      data:{district_id:district_id},
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
    }
  });
})
</script>
