<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stock Receipt
            <!-- <small>Optional description</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Stock Receipt</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="inner" id="invcontent">
            <div class="row">
                <div class="col-xs-12">

                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->


            <!-- Table row -->
            <div id="divName">
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0" style="background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;">
                            <tbody>
                                <tr>
                                    <td class="content-wrap aligncenter" style=" padding: 20px;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block" style="padding: 0 0 20px;
}">
                                                        <center><img src="<?php echo base_url(); ?>/Images/logo.jpeg" align="center" style="width:100px;border-radius: 50px;">
                                                            <address>
                                                                <h3 style="margin-top: 3px;">
                                                                    <strong>Venad Poultry Farmers Producer Company Limited</strong>
                                                                </h3>
                                                                <h4>
                                                                    NoXIV/542,
                                                                    Opposite Kottarakkara Railway Station,<br>
                                                                    Kottarakkara, ,Kottarakkara,Kerala,India<br>
                                                                    PIN:691506<br>Phone:0474 245 6225<br>
                                                            </address>
                                                            </h4>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block" style="padding: 0 0 20px;
}">
                                                        <table class="invoices" style=" margin: 40px auto;
    text-align: left;
    width: 80%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style=" padding: 5px 0;">
                                                                        <table class="invoice-items" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Product Name</td>
                                                                                    <td style="font-weight: bold;" class="alignright"><?php echo $records[0]->item_name; ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding-top: 20px;">Total Price</td>
                                                                                    <td style="padding-top: 20px;font-weight: bold;" class="alignright"><?php echo $records[0]->item_price . " " . "Rs"; ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="padding-top: 20px;">Total Quantity</td>
                                                                                    <td style="padding-top: 20px;font-weight: bold;" class="alignright"><?php echo $records[0]->item_quantity ?></td>
                                                                                </tr>

                                                                                <!-- <tr class="total" style=" border-top: 2px solid #333;border-bottom: 2px solid #333;font-weight: 700;padding-top: 20px;">
                                                                                    <td style="padding-top: 20px;" class="alignright" width="80%">Alloted Chicks ( <?php echo " " . $records->product_name; ?> )</td>
                                                                                    <td style="padding-top: 20px;" class="alignright"><?php echo $records->allot_quantity . " " . "Nos"; ?></td>
                                                                                </tr> -->
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column-->
                <div class="col-xs-4">

                </div>
                <!-- /.col -->
                <div class="col-xs-6">


                    <div class="table-responsive">

                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <hr>
            <div class="col-xs-12">
                <a target="_blank" class="btn btn-default" id="print" onclick="printDiv('divName')"><i class="fa fa-print"></i> Print</a>

                <a href="<?php echo base_url(); ?>Allotment" class="btn btn-primary pull-right"><i class="fa fa-eye"></i> Go to View</a>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->