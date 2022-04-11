<script type="text/javascript">
$table = $('#allotmentTable').DataTable( {
  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "ajax": {
    "url": "<?php echo base_url();?>Allotment/getAllotments",
    "type": "POST",
    "data" : function (d) {
    }
  },

  "createdRow": function ( row, data, index ) {
    console.log(data);
    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });

    // var today=new Date();
    // var beforedate=new Date(data['beforetwodays']);
    // if(beforedate <= today){
    //   $('td', row).eq(8).html('<center><b><p style="color:red;">'+data['vaccination_date']+'</p></b></center>');
    // }
    // else{
    //   $('td', row).eq(8).html('<center><p">'+data['vaccination_date']+'</p></center>');
    // }

    $('td', row).eq(9).html('<center><a href="<?php echo base_url();?>Allotment/receipt/'+data['allot_id']+'"><i class="fa fa-file iconFontSize-medium" ></i></a></center>');
    $('td', row).eq(10).html('<center><a href="<?php echo base_url();?>Allotment/edit/'+data['allot_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['allot_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },

  "columns": [
    { "data": "empty", "defaultContent":""},
    { "data": "product_name", "orderable": false },
    { "data": "member_name", "orderable": false },
    { "data": "allot_integration_code", "orderable": false },
    { "data": "member_type_name", "orderable": false },
    { "data": "allot_quantity", "orderable": false },
    { "data": "allot_weight", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "allotment_date", "orderable": false },
    { "data": "product_name", "orderable": false },
    { "data": "product_name", "orderable": false }
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

function confirmDelete(allot_id){
    var conf = confirm("Do you want to Delete Class ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Allotment/delete",
            data:{allot_id:allot_id},
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

  $( document ).ready(function() {
    $("#product22").select2();
    $("#memberTypeSelect").select2();
    $("#memberSelect").select2();
    $("#unit22").select2();
  });

  $('#mem_state').on('change',function(){
    $('#mem_disctrict').empty();
    var dist_id = $('#mem_state').val()
    $.ajax({
            url:"<?php echo base_url();?>Allotment/getMemberDistrict",
            data:{dist_id:dist_id},
            method:"POST",
            datatype:"json",
            success:function(data){
                var response = JSON.parse(data);
                //console.log(response);
                var dataset = response.records;
                var select = document.getElementById("mem_disctrict");
                $(select).append('<option value="">--SELECT--</option>');
                dataset.forEach((item) => {
                  $(select).append('<option value="'+item.district_id+'">'+item.district_name+'</option>');
                })
            }
        });
  })

  $('#mem_disctrict').on('change',function(){
    $('#mem_panchayat').empty();
    var panchayat_id = $('#mem_disctrict').val();
    $.ajax({
            url:"<?php echo base_url();?>Allotment/getMemberPanchayat",
            data:{panchayat_id:panchayat_id},
            method:"POST",
            datatype:"json",
            success:function(data){
                var response = JSON.parse(data);
                //console.log(response);
                var dataset = response.records;
                var select = document.getElementById("mem_panchayat");
                $(select).append('<option value="">--SELECT--</option>');
                dataset.forEach((item) => {
                  $(select).append('<option value="'+item.panchayath_id+'">'+item.panchayath_name+'</option>');
                })
            }
        });
  })

</script>

