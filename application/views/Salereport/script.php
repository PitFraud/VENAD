<!-- <script>
var response = $("#response").val();
if(response){
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$(function () {
  $("#productnum option:first").before('<option value="">--Please Select--</option>');
  $("#productnum").val("").change();
  $(".select2").select2();
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

  $table = $('#sale_details_table').DataTable( {
    "searching": false,
    "processing": true,
    "serverSide": true,
    "bDestroy" : true,
    "paging":   false,
    "ordering": false,
    "info":     false,
    dom: 'lBfrtip',
    buttons: [
      {
        title:'Sale Report',
        extend: 'copy',
        exportOptions: {
          columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13 ]
        }
      },
      {
        title:'Sale Report',
        extend: 'excel',
        exportOptions: {
          columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13 ]
        }
      },
      {
        title:'Sale Report',
        extend: 'pdf',
        exportOptions: {
          columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13 ]
        }
      },
      {
        title:'Sale Report',
        extend: 'print',
        exportOptions: {
          columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13 ]
        }
      },
      // {
      // extend: 'csv',
      // exportOptions: {
      // columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ]
      // }
      // },
    ],

    "ajax": {
      // "url": "<?php echo base_url();?>Salereport/get/",
      "url": "<?php echo base_url();?>Salereport/getSalesReportNew/",
      "type": "POST",
      "data" : function (d) {
        console.log(d);
      }
    },
    "createdRow": function ( row, data, index ) {
      $table.column(0).nodes().each(function(node,index,dt){
        $table.cell(node).data(index+1);
      });
    },
    "columns": [
      { "data": "dist_quantity_fk", "orderable":""},
      { "data": "item_name", "orderable": false },
      { "data": "member_name", "orderable": false },
      { "data": "dist_quantity_fk", "orderable": false },
      { "data": "dist_weight", "orderable": false },
      { "data": "unit_name", "orderable": false },
      { "data": "created_date", "orderable": false },
      { "data": "dist_quantity_fk", "orderable": false },
    ]

  } );
  $('#product').keyup(function (){
    $table.ajax.reload();
  });

});

$('#search').click(function () {

  $table.ajax.reload();
});
</script> -->
<script type="text/javascript">

$table = $('#distributionTable').DataTable( {
  // "processing": true,
  // "serverSide": false,
  // "bDestroy" : true,
  "searching": false,
  "processing": true,
  "serverSide": false,
  "bDestroy" : true,
  "paging":   false,
  "ordering": false,
  "info":     false,
   dom: 'lBfrtip',
buttons: [
  {
    title:'Purchase Report',
    extend: 'copy',
    exportOptions: {
      columns: [ 0,1,2,3,4,5,6]
    }
  },
  {
    title:'Purchase Report',
    extend: 'excel',
    exportOptions: {
      columns: [ 0,1,2,3,4,5,6]
    }
  },
  {
    title:'Purchase Report',
    extend: 'pdf',
    exportOptions: {
      columns: [ 0,1,2,3,4,5,6]
    }
  },
  {
    title:'Purchase Report',
    extend: 'print',
    exportOptions: {
      columns: [ 0,1,2,3,4,5,6]
    }
  },
  // {
    // extend: 'csv',
    // exportOptions: {
      // columns: [ 1,3,4,5,6 ]
    // }
  // },
],

  "ajax": {
    "url": "<?php echo base_url();?>Distribution/getDistributions",
    "type": "POST",
    "data" : function (d) {
    }
  },
  "createdRow": function ( row, data, index ) {

    $table.column(0).nodes().each(function(node,index,dt){
      $table.cell(node).data(index+1);
    });
    // $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>Drivers/edit/'+data['dist_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['dist_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
  },
  "columns": [
    { "data": "dist_quantity_fk", "orderable":""},
    { "data": "item_name", "orderable": false },
    { "data": "member_name", "orderable": false },
    { "data": "dist_quantity_fk", "orderable": false },
    { "data": "dist_weight", "orderable": false },
    { "data": "unit_name", "orderable": false },
    { "data": "created_date", "orderable": false },
    // { "data": "dist_quantity_fk", "orderable": false },
  ]
} );
function confirmDelete(driver_id){
  var conf = confirm("Do you want to Delete Driver Details ?");
  if(conf){
    $.ajax({
      url:"<?php echo base_url();?>Drivers/delete",
      data:{driver_id:driver_id},
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

$('#memberTypeSelect').on('change', function() {
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
        // $(select).append('<option value="'+item.member_id+'">'+item.member_name+'</option>');
        var html = '';
        html +='<option value="" disabled>Select Member</option>';
        var i;
        for(i=0; i<data.length; i++){
          html += '<option value='+item.member_id+'>'+item.member_name+'</option>';
        }
        $('#memberSelect').html(html);
      });
    }
  });
});
</script>
