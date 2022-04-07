<script type="text/javascript">



$table = $('#vehicleTable').DataTable( {



  "processing": true,

  "serverSide": false,

  "bDestroy" : true,

  "ajax": {

    "url": "<?php echo base_url();?>Vehicles_root/getVehicles_root",

    "type": "POST",

    "data" : function (d) {

    }

  },

  "createdRow": function ( row, data, index ) {

    $table.column(0).nodes().each(function(node,index,dt){

      $table.cell(node).data(index+1);

    });

    $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>Vehicles_root/view/'+data['vroot_id']+'"><i class="fa fa-eye iconFontSize-medium" ></i></a></center>');

  },

  "columns": [

    { "data": "empty", "defaultContent":""},

    { "data": "vehicle_name", "orderable": false },

    { "data": "driver_name", "orderable": false },

    { "data": "date", "orderable": false },

    { "data": "vehicle_name", "orderable": false },

  ]

} );

function confirmDelete(root_id){

   var conf = confirm("Do you want to Delete Root Map Details ?");

   if(conf){

       $.ajax({

           url:"<?php echo base_url();?>Vehicles_root/delete",

           data:{root_id:root_id},

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

   var TableManager = function (tableId, rowTag) {
  var mgr = {};
  mgr.tableId = tableId;
  mgr.rowTag = rowTag;

  mgr.appendRow = function (obj) {
    var table = $("#" + mgr.tableId);
    var newRow = table.find("#" + mgr.tableId + "_template").clone();
    mgr.wireUpRow(newRow);
    mgr.setRowData(newRow, obj);
    table.append(newRow);
  };

  mgr.appendEmptyRow = function () {
    mgr.appendRow({
      name: null,
      value: null
    });
  };

  mgr.prependRow = function (obj) {
    var table = $("#" + mgr.tableId);
    var newRow = table.find("#" + mgr.tableId + "_template").clone();
    mgr.wireUpRow(newRow);
    mgr.setRowData(newRow, obj);
    table.prepend(newRow);
  };

  mgr.wireUpRow = function (row) {
    row.find('button[name="' + mgr.rowTag + '_add"]').click(function () {
      mgr.appendEmptyRow();
    });

    row.find('button[name="' + mgr.rowTag + '_delete"]').click(function (evt) {
      var table = $("#" + mgr.tableId);
      var numTableRows = table.find('tr[title="annotation"]').size();
      if (numTableRows > 1) {
        $(evt.target).parents("tr").remove();
      }
    });
  };

  mgr.getRowData = function (row) {
    var data = {};
    var prefix = mgr.rowTag + "_";
    $(row)
      .find("input,select,textarea")
      .each(function (index, element) {
        var name = $(element).attr("name");
        var bareName = name.slice(name.indexOf(prefix) + prefix.length);

        data[bareName] = $(element).val();
      });
    return data;
  };

  mgr.setRowData = function (row, obj) {
    Object.getOwnPropertyNames(obj).forEach(function (name, idx, array) {
      row.find('input[name="' + mgr.rowTag + "_" + name + '"]').val(obj[name]);
    });
  };

  var table = $("#" + mgr.tableId);
  mgr.wireUpRow(table.find("#" + mgr.tableId + "_template"));

  return mgr;
};

var AnnotationTableManager = new TableManager("annotations", "annotation");

$(document).ready(function () {
  AnnotationTableManager.prependRow({
    name: "Tissue",
    value: "Lung"
  });
});


var downArrow = document.getElementById("btn1");
var upArrow = document.getElementById("btn2");

downArrow.onclick = function () {
    'use strict';
    document.getElementById("first-list").style = "top:-620px";
    document.getElementById("second-list").style = "top:-620px";
    downArrow.style = "display:none";
    upArrow.style = "display:block";
};

upArrow.onclick = function () {
    'use strict';
    document.getElementById("first-list").style = "top:0";
    document.getElementById("second-list").style = "top:80px";
    upArrow.style = "display:none";
    downArrow.style = "display:block";
};





</script>

