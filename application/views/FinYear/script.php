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
  var param = '';
  var $customerList=[ {'columnName':'customer_name','label':'Customer'} ];
  $(function () {

    var enquiry_type = {'J':'Job','C':'Complaint','F':'Follow-up'};
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Date picker
    $('#start_date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });
	$('#end_date').datepicker({
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

    $table = $('#Finyear_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>FinYear/get/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			if(data['fin_status']== 1)
			{
				$('td', row).eq(1).html('<center>'+data['fin_year']+' <sapn style="color:green;">Active Financialyear</sapn></center>');
			}
			else
			{
				$('td', row).eq(1).html('<center>'+data['fin_year']+'</center>');
			}
            $('td', row).eq(12).html('<center><a href="<?php echo base_url();?>FinYear/edit/'+data['finyear_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['finyear_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            $('td', row).eq(11).html('<center><a target="_blank" href="<?php echo base_url();?>FinYear/auditPrint/'+data['finyear_id']+'"><i class="fa fa-clipboard iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "fin_startdate", "orderable": false},
            { "data": "fin_year", "orderable": false },
            { "data": "fin_no_of_share_holders", "orderable": false },
            { "data": "fin_share_capital", "orderable": false },
            { "data": "fin_business_turn_over", "orderable": false },
            { "data": "fin_income_tax_period", "orderable": false },
            { "data": "fin_net_profit", "orderable": false },
            { "data": "fin_per_bonus", "orderable": false },
            { "data": "fin_divident_bonus", "orderable": false },
            { "data": "fin_startdate", "orderable": false },
            { "data": "fin_enddate", "orderable": false },
            { "data": "finyear_id", "orderable": false },
            { "data": "finyear_id", "orderable": false }
            
        ]
        
    } );
    
    
  });
 function confirmDelete(finyear_id){
    var conf = confirm("Do you want to Delete Finyear Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>FinYear/delete",
            data:{finyear_id:finyear_id},
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