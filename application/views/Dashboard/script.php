<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>
<script>
        $table = $('#fpo_branches').DataTable({
		"processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>Dashboard/getBranches",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			$('td', row).eq(7).html('<center><a href="<?php echo base_url();?>Branch/edit/'+data['branch_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete1('+data['branch_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
		},

        "columns": [
            { "data": "branch_status", "orderable": true },
            { "data": "branch_name", "orderable": false },
            { "data": "branch_address", "orderable": false },
            { "data": "branch_trade_licenses", "orderable": false },
            { "data": "branch_web_address", "orderable": false },
            { "data": "branch_phn", "orderable": false },
			{ "data": "branch_phn2", "orderable": false },
			{ "data": "branch_id", "orderable": false }
        ]
        
    });

    $table = $('#other_establishment').DataTable({
		"processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>Dashboard/getEstablishments",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			$('td', row).eq(5).html('<center><a href="<?php echo base_url();?>Member/edit/'+data['member_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete2('+data['member_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
		},

        "columns": [
            { "data": "member_status", "orderable": true },
            { "data": "member_name", "orderable": false },
            { "data": "member_address", "orderable": false },
            { "data": "member_email", "orderable": false },
            { "data": "member_pnumber", "orderable": false },
			{ "data": "member_id", "orderable": false }
        ]
        
    });

    $table = $('#Licenses').DataTable({
		"processing": true,
        "serverSide": true,
        "bDestroy" : true,
        
        "ajax": {
            "url": "<?php echo base_url();?>Dashboard/getLicenses",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			$('td', row).eq(6).html('<center><a href="<?php echo base_url();?>Licenses/edit/'+data['license_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete3('+data['license_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            $('td', row).eq(5).html('<center><a target="_blank" href="<?php echo base_url();?>Licenses/print/'+data['license_id']+'"><i class="fa fa-print iconFontSize-medium" ></i></a></center>');
		},

        "columns": [
            { "data": "license_status", "orderable": true },
            { "data": "license_name", "orderable": false },
            { "data": "license_number", "orderable": false },
            { "data": "license_reminder", "orderable": false },
            { "data": "license_expirery_date", "orderable": false },
            { "data": "license_upload", "orderable": false },
			{ "data": "license_id", "orderable": false }
        ]
        
    });

    function confirmDelete3(license_id){
    var conf = confirm("Do you want to Delete License Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Licenses/delete",
            data:{license_id:license_id},
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

    function confirmDelete2(member_id){
    var conf = confirm("Do you want to Delete Member Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Member/delete",
            data:{member_id:member_id},
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

    function confirmDelete1(branch_id){
    var conf = confirm("Do you want to Delete Branch Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Branch/delete",
            data:{branch_id:branch_id},
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