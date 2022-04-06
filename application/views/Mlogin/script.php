<script type="text/javascript">
$(document).ready(function(){
  $table = $('#MemberLoginTable').DataTable( {
    "processing": true,
    "serverSide": false,
    "bDestroy" : true,
    "ajax": {
      "url": "<?php echo base_url();?>Mlogin/get",
      "type": "POST",
      "data" : function (d) {
        console.log(d);
      }
    },
    "createdRow": function ( row, data, index ) {
      $table.column(0).nodes().each(function(node,index,dt){
        $table.cell(node).data(index+1);
      });
      // $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>Vaccination/edit/'+data['vaccination_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['vaccination_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
    },
    "columns": [
      { "data": "empty", "defaultContent":""},
      { "data": "member_name", "orderable": false },
      { "data": "member_mid", "orderable": false },
      { "data": "member_type_name", "orderable": false },
      { "data": "user_name", "orderable": false },
      { "data": "password", "orderable": false },
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

  $('#memberTypeSelect').change(function(){
    $('#memberSelect').empty();
    var id=this.value;
    $.ajax({
      url: '<?php echo base_url(); ?>Mlogin/getMemberDetailsWhere',
      type: 'post',
      data: {
        id:id
      },
      success: function(response){
        var data=JSON.parse(response);
        var select=document.getElementById("memberSelect");
        data.forEach((item) => {
          $(select).append('<option value="'+item.member_id+'">'+item.member_name+'</option>');
        });
      }
    });
  })


})
</script>
