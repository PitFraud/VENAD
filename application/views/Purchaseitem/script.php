<script>
    $(document).ready(function() {
        $("form").submit(function(e) {
            var c = 0;
            $('.table-bordered').each(function() {
                c++;
            });

            var total = $('#tax_total').val();
            var diff = $('#checkvalue').val();
            var total = parseFloat(total);
            var diff = parseFloat(diff);
            if (c == 0) {

                e.preventDefault(e);

                var options1 = {
                    'title': 'Error',
                    'style': 'error',
                    'message': 'Please Enter Products....!',
                    'icon': 'warning',
                };
                var n1 = new notify(options1);

                n1.show();
                setTimeout(function() {
                    n1.hide();
                }, 3000);
            } else {

            }

        });
    });

    var counter = 0;
    var response = $("#response").val();
    if (response) {
        console.log(response, 'response');
        var options = $.parseJSON(response);
        noty(options);
    }
    function addMore() {
        $("<DIV>").load("", function() {
            $(this).attr('data-validation', 'required');
            $(this).attr('data-validation', 'nameFields');
            $(this).attr('data-validation', 'digitsOnly');
            $(this).attr('data-validation', 'date');
            $(this).attr('data-validation', 'usPhone');
            $(this).attr('data-validation', 'email');
            $(this).attr('data-validation', 'dropDown');
            var htmlVal = '<DIV class="product-item" id="list"><input type="checkbox" name="item_index[]"/><table class="table table-bordered" cellspacing="1" ><tr><div class="form-group"><div class="col-md-1" id="product_listss"><b>Code</b><select name="product_code[]" class="form-control product_code" data-id='+counter+'  id="product_code' + counter + '" autofocus /></select></div> <div class="col-md-2" id="product_listss"><b>Item</b><select name="product_id_fk[]" class="form-control product_num" data-id='+counter+' id="product_num' + counter + '" autofocus /></select></div><div class="col-md-1" id="hsn"><b>HSN</b><select name="hsn[]" class="form-control hsn" data-id='+counter+'  id="hsn' + counter + '" autofocus /></select></div><div class="form-group"><div class="col-md-1">Rate<input type="text"   data-validation="digitsOnly" data-pms-required="true" class="form-control mrp amountclass" id="mrp' + counter + '" name="mrp[]"  placeholder="Rate"></div><div class="form-group"><div class="col-md-1"><b>Quantity</b><input type="text"   data-validation="digitsOnly" data-pms-required="true" class="form-control quantity" id="pquantity_' + counter + '" name="purchase_quantity[]" placeholder="Qty"></div><div class="col-md-1"><b>Discount</b><input type="text" placeholder="discount %" data-pms-required="true" data-validation="digitsOnly" class="form-control discount" id="discount_' + counter + '" name="discount_price[]" placeholder="Discount Rate"></div><div class="col-md-1"><b>CGST</b><input type="text" placeholder="CGST" class="form-control csgt"  id="cgst' + counter + '" name="cgst[]"></div><div class="col-md-1"><b>SGST</b><input type="text" placeholder="SGST" class="form-control sgst"  id="sgst' + counter + '" name="sgst[]"></div><div class="col-md-1"><b>IGST</b><input type="text" placeholder="IGST" class="form-control igst"  id="igst' + counter + '" name="igst[]"></div><div class="col-md-1"><label>Total Amount :</label><label><span id="totalAmount_' + counter + '"></span></label><input type="hidden" class="totalPrice"  name="purchase_total_price[]" id="total_price_' + counter + '" ><input type="hidden" id="taxpercantage_' + counter + '" ></div></div></tr></table></DIV>';
            $("#product").append(htmlVal);
            var param = '';
            $('#product_num_' + counter + '').focus();
            $('#product_num_' + counter + '').click(function() {
                $("#product_num").val('');
            });

            $('#product_num_' + counter + '').change(function() {
                setTimeout(function() {
                    var a = $("#productnum_").val();
                    if (a === '') {
                        $('#product_num_' + counter + '').val('');
                        var options1 = {
                            'title': 'Error',
                            'style': 'error',
                            'message': 'Product Not Exist....!',
                            'icon': 'warning',
                        };
                        var n1 = new notify(options1);
                        if (a === '') {
                            n1.show();
                        }

                    }
                }, 1000);
            });

            $('#hsn' + counter + '').change(function() {
              var id=this.value;
              $.ajax({
                url: '<?php echo base_url(); ?>Purchaseitem/getSingleHSNDetails',
                type: 'post',
                data: {
                  id:id
                },
                success: function(response){
                  data=JSON.parse(response)
                  console.log(data.hsn_cgst);
                  $('#cgst'+counter).val(data.hsn_cgst);
                  $('#sgst'+counter).val(data.hsn_sgst);
                  $('#igst'+counter).val(data.hsn_igst);
                  // $('#product_code'+counter_value+' option[value='+this.value+']').prop('selected', true);
                }
              });
            });
            if($('#mrp' + counter + '').val()==''){
              $('#mrp' + counter + '').val(0);
            }
            if($('#pquantity_' + counter + '').val()==''){
              $('#pquantity_' + counter + '').val(0);
            }
            if($('#discount_' + counter + '').val()==''){
              $('#discount_' + counter + '').val(0);
            }


            $('#mrp' + counter + '').change(function(){
              var mrp = this.value;
              var disc = $('#discount_' + counter + '').val();
              console.log(parseFloat(disc));
            });


            $.ajax({
                url: "<?php echo base_url() ?>Purchaseitem/getproductname",
                type: 'POST',
                success: function(data) {
                    $.each(data, function(product_id, product_name) {
                        var opt = $('<option />');
                        opt.val(product_id);
                        opt.text(product_name);
                        $('#product_num' + counter + '').append(opt);
                    });

                    var select = $('#product_num' + counter + '');
                    select.html(select.find('option').sort(function(x, y) {
                        return $(x).text() > $(y).text() ? 1 : -1;
                    }));
                    $('#product_num' + counter + '').prepend("<option value=''>Select</option>");
                }
            });

            $.ajax({
              url: '<?php echo base_url(); ?>Purchaseitem/getproductcode',
              type: 'post',
              data: {},
              success: function(response){
                var data = JSON.parse(response);
                var select=document.getElementById('product_code'+counter+'');
                data.forEach((item) => {
                  $(select).append('<option value="'+item.product_id+'">'+item.product_code+'</option>');
                });
              }
            });
            $.ajax({
              url: '<?php echo base_url(); ?>Purchaseitem/gethsncodes',
              type: 'post',
              data: {},
              success: function(response){
                var data = JSON.parse(response);
                var select=document.getElementById('hsn'+counter+'');
                data.forEach((item) => {
                  $(select).append('<option value="'+item.hsn_id+'">'+item.hsncode+'</option>');
                });
              }
            });

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Purchaseitem/gettax",
                success: function(cities) {

                    $('#taxtype_' + counter + '').append('<option value="">---Select Tax---</option>');

                    $.each(cities, function(id, city) {
                        var opt = $('<option />');
                        opt.val(id);
                        opt.text(city);
                        $('#taxtype_' + counter + '').append(opt);
                    });

                }
            });
        });
        counter++;
    }

    function loaditemnames(id){
        var item_id = id;
        var htmlval;
        $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Purchaseitem/getItemName",
                data: {item_id : item_id},
                success: function(data) {
                    if(data[0] != ""){
                    var datas = JSON.parse(data);
                    console.log(datas[0].product_name)
                        var opt = $('<option selected="selected" value="'+datas[0].product_id+'">'+datas[0].product_name+'</option>');
                        $('#product_num' + counter + '').prepend(opt);
                    }
                    else
                    {
                        $('#product_num' + counter + '').prepend("<option value=''>Select</option>");
                    }
                }
            });
    }

// ###############################################################
  $(document).on("change", '.product_code', function() {
    var counter_value=this.getAttribute('data-id');
    $('#product_num'+counter_value+' option[value='+this.value+']').prop('selected', true);

  });
  $(document).on("change", '.product_num', function() {
    var counter_value=this.getAttribute('data-id');
    $('#product_code'+counter_value+' option[value='+this.value+']').prop('selected', true);
  });

// ##############################################################
    $(document).on("blur", '.discount', function() {

        var taxtype = $(this).val();
        // alert(taxtype);
        var counterId = $(this).attr("id");
        var counter = counterId.split("_")[1];
        console.log(counterId, "counterID");
        console.log(counter, "counter");
        // if (taxtype) {
        //     $.ajax({
        //         url: "<?php echo base_url() ?>Purchaseitem/tax_amount",
        //         type: 'POST',
        //         data: {
        //             value: taxtype
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             $('#taxpercantage_' + counter + '').val(data['taxamount']);
                    var amount = $('#mrp' + counter + '').val();
                    var quantity = $('#pquantity_' + counter + '').val();
                    // var tax = $('#taxpercantage_' + counter + '').val();
                    var cost = $('#pprice_' + counter + '').val();
                    var discount = $('#discount_' + counter + '').val();

                    if (quantity !== '' && amount !== '') {
                        var total_amount = parseFloat(amount) * parseFloat(quantity);

                        if (discount > 0) {
                            var discount_amount = parseFloat(total_amount) - (parseFloat(total_amount) * parseFloat(discount)) / 100;

                        } else {
                            var discount_amount = parseFloat(total_amount);
                        }
                        //alert(discount_amount);

                        //var taxamount = (parseFloat(discount_amount) * parseFloat(tax)) / 100;
                        //var full_amount = parseFloat(discount_amount) + parseFloat(taxamount);
                        $('#totalAmount_' + counter + '').html(parseFloat(discount_amount).toFixed(2));
                        $('#total_price_' + counter + '').val(parseFloat(discount_amount).toFixed(2));
                        var netTotal = 0;
                        $(".totalPrice").each(function(index) {
                            netTotal = netTotal + parseFloat($(this).val());
                        });
                        $(".NetTotalAmount").css('display', 'block');
                        $('#grand_total').html(parseFloat(netTotal).toFixed(2));
                        var expensetotal = $('#expensetotal').val();
                        var grandtotal = $('#grandtotal').val();
                        $('#net_total').val((netTotal).toFixed(2));
                        $('#net_total').trigger('change');
                    } else {
                        total_amount = 0;
                    }
        //         },
        //         error: function(e) {
        //             console.log("error");
        //         }
        //     });
        // }
    });

    $(document).on("change", '.quantity', function() {
        var counterId = $(this).attr("id");
        var counter = counterId.split("_")[1];
        console.log(counterId, "counterID");
        console.log(counter, "counter");
        var amount = $('#pprice_' + counter + '').val();
        var quantity = $('#pquantity_' + counter + '').val();
        var tax = $('#taxpercantage_' + counter + '').val();
        if (tax !== '' && quantity !== '' && amount !== '') {
            var taxamount = (parseFloat(amount) * parseFloat(tax)) / 100;
            var full_amount = parseFloat(amount) + parseFloat(taxamount);
            var total_amount = parseFloat(full_amount) * parseFloat(quantity);
            $('#totalAmount_' + counter + '').html(parseFloat(total_amount).toFixed(2));
            $('#total_price_' + counter + '').val(parseFloat(total_amount).toFixed(2));
            var netTotal = 0;
            $(".totalPrice").each(function(index) {
                netTotal = netTotal + parseFloat($(this).val());
            });
            $(".NetTotalAmount").css('display', 'block');
            $('#grand_total').html(parseFloat(netTotal).toFixed(2));
            var expensetotal = $('#expensetotal').val();
            var grandtotal = $('#grandtotal').val();
            $('#net_total').val((netTotal).toFixed(2));
        } else {
            total_amount = 0;
        }
    });

    $(document).on("change", '.price', function() {
        var counterId = $(this).attr("id");
        var counter = counterId.split("_")[1];
        console.log(counterId, "counterID");
        console.log(counter, "counter");
        var amount = $('#pprice_' + counter + '').val();
        var quantity = $('#pquantity_' + counter + '').val();
        var tax = $('#taxpercantage_' + counter + '').val();
        if (tax !== '' && quantity !== '' && amount !== '') {
            var taxamount = (parseFloat(amount) * parseFloat(tax)) / 100;
            var full_amount = parseFloat(amount) + parseFloat(taxamount);
            var total_amount = parseFloat(full_amount) * parseFloat(quantity);
            $('#totalAmount_' + counter + '').html(parseFloat(total_amount).toFixed(2));
            $('#total_price_' + counter + '').val(parseFloat(total_amount).toFixed(2));
            var netTotal = 0;
            $(".totalPrice").each(function(index) {
                netTotal = netTotal + parseFloat($(this).val());
            });
            $(".NetTotalAmount").css('display', 'block');
            $('#grand_total').html(parseFloat(netTotal).toFixed(2));
            var expensetotal = $('#expensetotal').val();
            var grandtotal = $('#grandtotal').val();
            $('#net_total').val((netTotal).toFixed(2));
        } else {
            total_amount = 0;
        }
    });
    var $productList = [{
        'columnName': 'product_name',
        'label': 'Product'
    }];
    var param = '';
    $('#product_name').rcm_autoComplete('<?php echo base_url(); ?>index.php/common/getProductList', $productList, param, getProduct);

    function getProduct(el, event, item) {
        console.log(el);
        console.log(el.next());
        if (item.product_id) {
            el.val(item.product_num);
            $('#product_id').val(item.product_id);
        }
    }
    $(function() {
        $("#vendor_id_fk option:first").before('<option value="">----Please Select---</option>');
        $("#vendor_id_fk").val("").change();
        var ctnm = $('#vendor_name').val();
        if (ctnm) {
            $("#vendor_id_fk").val(ctnm).change();
        }
        $(".select2").select2();
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {
            "placeholder": "dd/mm/yyyy"
        });
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


        $table = $('#purchase_details_table').DataTable({
            "searching": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "aLengthMenu": [
                [100, 200, 400],
                [100, 200, 400]
            ],
            "iDisplayLength": 100,

            "ajax": {
                "url": "<?php echo base_url(); ?>Purchaseitem/get/",
                "type": "POST",
                "data": function(d) {
                    //d.invoice_number = $('#invoice_number').val();
                }
            },
            "createdRow": function(row, data, index) {

                $table.column(0).nodes().each(function(node, index, dt) {
                    $table.cell(node).data(index + 1);
                });
                $('td', row).eq(8).html('<center><a target ="_blank"  href="<?php echo base_url(); ?>Purchaseitem/invoice/' + data['auto_invoice'] + '"><i class="fa  fa-file iconFontSize-medium" ></i></a></center>');
                if (data['stockstatus'] == 0) {
                    $('td', row).eq(9).html('<center><input type="hidden" class="invno" value="' + data['auto_invoice'] + '"/><a onclick="return masterStock(' + data['auto_invoice'] + ')"><i class="fa fa-check-square-o" ></i></a></center>');
                } else {
                    $('td', row).eq(9).html('<center><i class="fa fa-cubes" ></i></center>');
                }
                $('td', row).eq(10).html('<center><a href="<?php echo base_url(); ?>Purchaseitem/view/' + data['auto_invoice'] + '"><i class="fa fa-eye" ></i></a></center>');
            },

            "columns": [{
                    "data": "purchase_status",
                    "orderable": false
                },
                {
                    "data": "invoice_number",
                    "orderable": false
                },
                {
                    "data": "vendorname",
                    "orderable": false
                },
                {
                    "data": "purchase_dat",
                    "orderable": false
                },
                {
                    "data": "prcount",
                    "orderable": false
                },
                {
                    "data": "total",
                    "orderable": false
                },
                {
                    "data": "pur_paid_amt",
                    "orderable": false
                },
                {
                    "data": "pur_new_bal",
                    "orderable": false
                },
                {
                    "data": "invoice_number",
                    "orderable": false
                },
                {
                    "data": "invoice_number",
                    "orderable": false
                },
                {
                    "data": "invoice_number",
                    "orderable": false
                },
            ]

        });
    });
    $(document).on("change", '.product_num', function() {
        var counterId = $(this).attr("id");
        var counter = counterId.split("_cmpny")[1];
        console.log(counterId, "counterID");
        console.log(counter, "counter");
        // $('#mrp'+counter+'').empty();
        var product_num = $(this).val();
        if (product_num) {
            $.ajax({
                url: "<?php echo base_url(); ?>Purchaseitem/getprice",
                type: 'POST',
                data: {
                    product_num: product_num
                },
                dataType: 'json',
                success: function(data) {
                    $('#mrp' + counter + '').val(data['product_price']);
                    $('#mrp').val(data['product_price']);
                }
            });
        }
    });
    // Auto Searching//

    function getVendorName(el, event, item) {
        console.log(item);
        if (item.vendor_id) {
            el.val(item.vendorname);
            $("#vendor_id").val(item.vendor_id);
            $("#vendor_phone").val(item.vendor_phone);
            $("#vendorgst").val(item.vendorgst);
        }
    }
    $(document).on("change", '#vendor_id_fk', function() {
        var id = $(this).val();

        if (id) {
            $.ajax({
                url: "<?php echo base_url(); ?>Purchaseitem/get_gst",
                type: 'POST',
                data: {
                    vid: id
                },
                dataType: 'json',
                success: function(data) {
                    $('#vendorgst').val(data[0]['vendorgst']);
                }
            });

            $.ajax({
                url: "<?php echo base_url(); ?>Purchaseitem/get_old_bal",
                type: 'POST',
                data: {
                    vid: id
                },
                dataType: 'json',
                success: function(data) {
                    $('#old_bal').html(data[0]['old_balance']);
                    $('#old_bal_').val(data[0]['old_balance']);
                    $('#net_bal').html(data[0]['old_balance']);
                    $('#net_balance').val(data[0]['old_balance']);
                    $('#netbal').val(data[0]['old_balance']);
                }
            });
        }
    });
    //********************************* CALCULATING NEW BALANCE AMOUNT ***************************//
    $(document).on('change', '#payng_amt', function() {
        var payng_amt = $(this).val();
        var old_bal = $('#old_bal').html();
        var new_bal = parseFloat(old_bal) + parseFloat($('#net_total').val()) - parseFloat(payng_amt);
        $('#new_bal').val(new_bal);
        $('#net_bal').html(new_bal);
    });
    $(document).on("change", '#net_total', function() {
        var netTotal = $(this).val();
        var old_bal = $('#old_bal').html();
        var payng_amt = $('#payng_amt').val();
        var new_bal = parseFloat(netTotal) + parseFloat(old_bal) - parseFloat(payng_amt);
        $('#net_bal').html(new_bal);
        $('#new_bal').val(new_bal);

    });

    function masterStock(auto_invoice) {
        var conf = confirm("Do you want to update Stock ?");
        if (conf) {
            $.ajax({
                url: "<?php echo base_url(); ?>Purchaseitem/masterStock",
                data: {
                    auto_invoice: auto_invoice
                },
                type: "POST",
                datatype: "json",
                success: function(data) {
                    var options = $.parseJSON(data);
                    noty(options);
                    $table.ajax.reload();
                }
            });
        }
    }

    $('#search').click(function() {

        $table.ajax.reload();
    });


    function deleteRow() {
        $('DIV.product-item').each(function(index, item) {
            jQuery(':checkbox', this).each(function() {
                if ($(this).is(':checked')) {
                    $(item).remove();
                }
            });
        });
    }


    function confirmDelete(purchase_id) {

        var conf = confirm("Do you want to Delete Purchase ?");
        if (conf) {
            $.ajax({
                url: "<?php echo base_url(); ?>Purchaseitem/delete",
                data: {
                    purchase_id: purchase_id
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
    $(document).on("change", '.product_num', function() {
        var product_id_fk = $('#product_num' + counter + '').val();
        //console.log(this.id);
        if (product_id_fk != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Purchaseitem/fetchPrice",
                method: "POST", //This is the form method
                data: {
                    product_id_fk: product_id_fk
                },
                type: "application/json",
                success: function(data) {
                    data = $.parseJSON(data);
                    let product_price = data['price'].product_price;
                    // console.log('price', price.product_price);
                    // console.log('mrp_id => ', '#mrp'+counter);
                    $('#mrp' + counter).val(product_price);
                }
            })
        }
    });

    function send() {
        document.theform.submit()
    }
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url(); ?>Purchaseitem/get_invc_no/",
            type: "POST",
            datatype: "json",
            success: function(data) {
                var options = $.parseJSON(data);
                var d = parseFloat(options);
            }
        });
    });
</script>
