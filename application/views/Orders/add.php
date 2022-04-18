<style type="text/css">
   .fsize
  {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Orders Information
         <small id="date" class="col-md-4"></small>
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Orders/"><i class="fa fa-dashboard"></i> Back to List</a></li>
        <li class="active"></li>
      </ol>
    </section>
     <!-- Main content -->
     <form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/Orders/add" enctype="multipart/form-data">
    <section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <div class="col-md-8"><h2 class="box-title"></h2> </div>
            </div>
            <div class="box-body">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
             <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Order item</b></h3>
                </div>
                  <div class="panel-body" style="font-weight:bold;">
                  <input type="hidden" name="order_id" value="<?php if(isset($records->order_id)) echo $records->order_id ?>"/>
              <div class="form-group row">
                <div class="col-md-6">
                  <label class="fsize">Choose Item</label>
                  <select name="product" class="form-control" id="productSelect">
                      <option value="">-SELECT PRODUCT-</option>
                      <?php foreach($products as $product){?>
                        <option <?php if(isset($records->order_id)){if($records->item_id==$product->item_id){echo "selected";}} ?>  value="<?php echo $product->item_id; ?>"><?php echo $product->item_name; ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="fsize">No of Packets/Quantity</label>
                  <input type="number" data-pms-required="true" autofocus class="form-control" name="quantity"  value="<?php if(isset($records->order_id)) echo $records->quantity ?>">
                </div>
              </div><!--form-group--><br>
          </div>
        </div>
      </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             <br>
          <div class="box-footer">
          <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-4">
          <button type="button" class="btn btn-danger" onclick="window.location.reload();">Cancel</button>
          <button type="submit" class="btn btn-primary">Place order</button>
          </div>
          </div>
          </div>
     </div>
    </section>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
