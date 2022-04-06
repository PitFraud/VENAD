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
  $("#unit option:first").before('<option value="">----Please Select---</option>');
  $("#unit").val("").change();
  var ctnm = $('#branch_unit').val();
  if(ctnm){$("#unit").val(ctnm).change();}
  $(".select2").select2();

  $("#animator option:first").before('<option value="">----Please Select---</option>');
  $("#animator").val("").change();
  var ctnm = $('#branch_animator').val();
  if(ctnm){$("#animator").val(ctnm).change();}
  $(".select2").select2();
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
      "url": "<?php echo base_url();?>Basicinfo/get/",
      "type": "POST",
      "data" : function (d) {
        console.log(d);
      }
    },
    "createdRow": function ( row, data, index ) {

      $table.column(0).nodes().each(function(node,index,dt){
        $table.cell(node).data(index+1);
      });

      $('td', row).eq(20).html('<center><a href="<?php echo base_url();?>index.php/Basicinfo/edit/'+data['basic_info_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['basic_info_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
    },

    "columns": [
      { "data": "basic_status", "orderable": false },
      { "data": "basic_comp_name", "orderable": false },
      { "data": "basic_desc", "orderable": false },
      { "data": "bsic_reg_no", "orderable": false },
      { "data": "basic_address", "orderable": false },
      { "data": "basic_cn", "orderable": false },
      { "data": "basic_join_date", "orderable": false },
      { "data": "basic_web_add", "orderable": false },
      { "data": "basic_email_add", "orderable": false },
      { "data": "basic_pan", "orderable": false },
      { "data": "basic_udhyam", "orderable": false },
      { "data": "basic_drug_lic", "orderable": false },
      { "data": "basic_trade_lic", "orderable": false },
      { "data": "basic_gst", "orderable": false },
      { "data": "basic_farm", "orderable": false },
      { "data": "basic_import_export_code", "orderable": false },
      { "data": "basic_fssai", "orderable": false },
      { "data": "basic_title", "orderable": false },
      { "data": "basic_phone_1", "orderable": false },
      { "data": "basic_phone_2", "orderable": false },
      { "data": "basic_info_id", "orderable": false },

    ]

  } );


});

function confirmDelete(basic_info_id){
  var conf = confirm("Do you want to Delete Basic Info ?");
  if(conf){
    $.ajax({
      url:"<?php echo base_url();?>Basicinfo/delete",
      data:{basic_info_id:basic_info_id},
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
