<style type="text/css">
.fsize
{
  font-size: 14px;
  font-family: 'Rubik', sans-serif;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add production Item
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="<?php echo base_url();?>ProductManagement/"><i class="fa fa-dashboard"></i>Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>ProductManagement/add" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          </div>
          <input type="hidden">
          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>ADD PRODUCTION ITEM</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>
                 <div class="panel-body" style="font-weight:bold;">
                 <input type="hidden" name="item_code" value="<?php if(isset($records[0]->item_id)) echo $records[0]->item_id ?>">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="fsize">Item Name</label>
                    <input class="form-control" type="text" name="name" placeholder="ENTER ITEM NAME" value="<?php if(isset($records[0]->item_name)) echo $records[0]->item_name ?>">
                  </div>
                  <div class="col-md-6">
                    <label class="fsize">Product Code</label>
                    <input class="form-control" type="text" style="text-transform:uppercase" name="prod_codes" placeholder="Enter Product Code" value="<?php if(isset($records[0]->product_code)) echo $records[0]->product_code ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <br>
          <div class="box-footer">
            <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-danger" onclick="window.location.reload();">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Item</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
