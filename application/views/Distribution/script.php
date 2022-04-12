<script type="text/javascript">
  $table = $('#distributionTable').DataTable({
    // "processing": true,
    // "serverSide": false,
    // "bDestroy" : true,
    "ajax": {
      "url": "<?php echo base_url(); ?>Distribution/getDistributions",
      "type": "POST",
      "data": function(d) {}
    },
    "createdRow": function(row, data, index) {
      $table.column(0).nodes().each(function(node, index, dt) {
        $table.cell(node).data(index + 1);
      });
      $('td', row).eq(11).html('<center><a href="<?php echo base_url(); ?>Distribution/edit/' + data['dist_id'] + '"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete(' + data['dist_id'] + ')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
    },
    "columns": [{
        "data": "dist_quantity_fk",
        "orderable": ""
      },
      {
        "data": "item_name",
        "orderable": false
      },
      {
        "data": "dist_code",
        "orderable": false
      },
      {
        "data": "member_name",
        "orderable": false
      },
      {
        "data": "dist_quantity_fk",
        "orderable": false
      },
      {
        "data": "dist_weight",
        "orderable": false
      },
      {
        "data": "unit_name",
        "orderable": false
      },
      {
        "data": "created_date",
        "orderable": false
      },
      {
        "data": "dist_next_date",
        "orderable": false
      },
      {
        "data": "dist_mop",
        "orderable": false
      },
      {
        "data": "dist_paid",
        "orderable": false
      },
      {
        "data": "dist_quantity_fk",
        "orderable": false
      },
    ]
  });

  function confirmDelete(driver_id) {
    var conf = confirm("Do you want to Delete Driver Details ?");
    if (conf) {
      $.ajax({
        url: "<?php echo base_url(); ?>Drivers/delete",
        data: {
          driver_id: driver_id
        },
        method: "POST",
        datatype: "json",
        success: function(data) {
          var options = $.parseJSON(data);
          noty(options);
          $table.ajax.reload();
        }
      });
    }
  }
  $('#memberTypeSelect').on('change', function() {
    $('#memberSelect').empty();
    var id = this.value;
    $.ajax({
      url: '<?php echo base_url(); ?>Allotment/getMembersWhere',
      type: 'post',
      data: {
        id: id
      },
      success: function(response) {
        var data = JSON.parse(response);
        var select = document.getElementById("memberSelect");
        data.forEach((item) => {
          $(select).append('<option value="' + item.member_id + '">' + item.member_name + '</option>');
        });
      }
    });
  });
  $('#productionItem').on('change', function() {
    var id = this.value;
    $.ajax({
      url: '<?php echo base_url(); ?>Distribution/getItemStockBalance',
      type: 'post',
      data: {
        item_id: id
      },
      success: function(response) {
        $('#availabale_stock').html(response);
        $('#availabale_stock_hidden').val(response);
      }
    });
  })
  $('#quantity').on('change', function() {
    if ($('#productionItem').val() != '') {
      var avl_bal = parseInt($('#availabale_stock_hidden').val());
      if (avl_bal < this.value) {
        alert('Available:' + avl_bal + ' Given:' + this.value + '');
      }
    }
  })
</script>