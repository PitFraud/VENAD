<script type="text/javascript">
  $(document).ready(function(){
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
              $('#share_period').val(data.settings_divident_percent);
              $('#period_type option[value='+data.settings_period_type+']').attr('selected','selected');
          }
      });
    })
  })
</script>
