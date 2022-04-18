<script type="text/javascript">
  $(document).ready(function(){

    $table = $('#shareTable').DataTable( {
      "processing": true,
      "serverSide": false,
      "bDestroy" : true,
      "ajax": {
        "url": "<?php echo base_url();?>ShareSettings/getCurrentSettings",
        "type": "POST",
        "data" : function (d) {
        }
      },
      "createdRow": function ( row, data, index ) {
        $table.column(0).nodes().each(function(node,index,dt){
          $table.cell(node).data(index+1);
        });
        // $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>Share/edit/'+data['share_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['share_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        if(data['settings_period_type']==1){
          $('td', row).eq(4).html('Month(s)');
        }
        else{
          $('td', row).eq(4).html('Day(s)');
        }
      },
      "columns": [
        { "data": "empty", "defaultContent":""},
        { "data": "share_name", "orderable": false },
        { "data": "share_value", "orderable": false },
        { "data": "settings_share_period", "orderable": false },
        { "data": "settings_period_type", "orderable": false },
        { "data": "settings_divident_percent", "orderable": false },
        { "data": "updated_at", "orderable": false },
      ]
    } );


    $('#shareSelect').on('change',function(){
      $('#share_period').empty();
      var share_id = this.value
      $.ajax({
          url:"<?php echo base_url();?>ShareSettings/getSingleShareSettingsDetails",
          data:{share_id:share_id},
          method:"POST",
          datatype:"json",
          success:function(response){
              var data=JSON.parse(response);
              console.log(data);
              $('#divident_percentage').val(data.settings_divident_percent);
              $('#share_period').val(data.settings_share_period);
              $('#period_type option[value='+data.settings_period_type+']').attr('selected','selected');
          }
      });
    })
  })
</script>
