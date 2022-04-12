<style type="text/css">
  .fsize {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Item Category Information
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>

    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Product/itemCategory/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>

  <!-- Main content -->
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/Product/addCategory" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            <div class="col-md-8">
              <h2 class="box-title"></h2>
            </div>
          </div>

          <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>NEW ITEM CATEGORY</b></h3>
                </div>

                <div class="panel-body" style="font-weight:bold;">
                  <input type="hidden" name="prod_cat_id" value="<?php if (isset($records->prod_cat_id)) echo $records->prod_cat_id ?>" />
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="">Category Name</label>
                      <input type="text" name="cat_name" id="" class="form-control" placeholder="Enter Category name" value="<?php if (isset($records->prod_cat_name)) echo $records->prod_cat_name ?>">
                      <?php echo validation_errors(); ?>
                    </div>
                    <div class="col-md-6">
                      <label for="">Category Code</label>
                      <input type="text" name="cat_code" id="" class="form-control" placeholder="Enter Category Code" value="<?php if (isset($records->prod_cat_code)) echo $records->prod_cat_code ?>">
                      <?php echo validation_errors(); ?>
                    </div>
                  </div>
                </div>

                <!-- /.box-header -->
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
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  function getsubcat() {
    var type = document.getElementById("product_type").value;
    ///alert(type);
    if (type == 3) {
      document.getElementById("product_sub_type").style.display = "block";
    } else {
      document.getElementById("product_sub_type").style.display = "none";
    }
  }
</script>