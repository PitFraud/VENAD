  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Basic Information
              <small id="date" class="col-md-4"></small>
              <!-- <small>Optional description</small> -->
          </h1>
          <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>Basicinfo"><i class="fa fa-dashboard"></i> Back to List</a></li>
              <li class="active"></li>
          </ol>
      </section>
      <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/Basicinfo/add" enctype="multipart/form-data">
          <!-- Main content -->
          <section class="content">
              <div class="row">
                  <!-- right column -->
                  <div class="col-md-12">
                      <!-- Horizontal Form -->
                      <div class="box box-info">
                          <div class="box-header with-border">
                              <h3 class="box-title"></h3>
                          </div>
                          <!-- /.box-header -->
                          <!-- form start -->
                          <!-- radio -->
                          <div class="form-group">
                              <input type="hidden" name="basic_info_id" value="<?php if (isset($records->basic_info_id)) echo $records->basic_info_id ?>" />
                              <?php echo validation_errors(); ?>
                              <label for="inputEmail3" class="col-sm-2 control-label"></label>
                          </div>
                          <div class="box-body">
                              <div class="col-lg-2"></div>
                              <div class="col-lg-8">
                                  <div class="panel panel-danger">
                                      <div class="panel-heading">
                                          <h3 class="panel-title"><b>BASIC INFO INFORMATION</b></h3>
                                      </div>
                                      <div class="panel-body" style="font-weight:bold;">
                                          <div class="form-group">
                                              <div class="col-md-12">
                                                  <label>Branch Name</label>
                                                  <input type="text" autofocus class="form-control" name="bas_name" value="<?php if (isset($records->basic_comp_name)) echo $records->basic_comp_name ?>">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-md-12">
                                                  <label>Description</label>
                                                  <textarea name="bas_desc" id="" class="form-control" cols="30" rows="10"><?php if (isset($records->basic_desc)) echo $records->basic_desc ?></textarea>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-md-12">
                                                  <label>Address <span style="color:red"></span></label>
                                                  <textarea required class="form-control" name="bas_addr" id="branch_address" rows="3"><?php if (isset($records->basic_address)) echo $records->basic_address ?></textarea>
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Reg No <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_reg_no" value="<?php if (isset($records->bsic_reg_no)) echo $records->bsic_reg_no ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>C/N No <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_cn" value="<?php if (isset($records->basic_cn)) echo $records->basic_cn ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Incorporated Date <span style="color:red"></span></label>
                                                  <input type="date" class="form-control" name="bas_date" value="<?php if (isset($records->basic_join_date)) echo $records->basic_join_date ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Web Url <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_web_url" value="<?php if (isset($records->basic_web_add)) echo $records->basic_web_add ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Email <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_email" value="<?php if (isset($records->basic_email_add)) echo $records->basic_email_add ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Pan No <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_pan" value="<?php if (isset($records->basic_pan)) echo $records->basic_pan ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Udhyam <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_udhyam" value="<?php if (isset($records->basic_udhyam)) echo $records->basic_udhyam ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Drug License <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_drug_lic" value="<?php if (isset($records->basic_drug_lic)) echo $records->basic_drug_lic ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Trade License <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_trade_lic" value="<?php if (isset($records->basic_trade_lic)) echo $records->basic_trade_lic ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>GST <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_gst" value="<?php if (isset($records->basic_gst)) echo $records->basic_gst ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Farm <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_farm" value="<?php if (isset($records->basic_farm)) echo $records->basic_farm ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Impot/Export Code <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_imp_exp_code" value="<?php if (isset($records->basic_import_export_code)) echo $records->basic_import_export_code ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>FSSAI <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_fssai" value="<?php if (isset($records->basic_fssai)) echo $records->basic_fssai ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Title <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_title" value="<?php if (isset($records->basic_title)) echo $records->basic_title ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Phone 1 <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_phone_1" value="<?php if (isset($records->basic_phone_1)) echo $records->basic_phone_1 ?>">
                                              </div>
                                              <div class="col-md-6">
                                                  <label>Phone 2 <span style="color:red"></span></label>
                                                  <input type="text" class="form-control" name="bas_phone_2" value="<?php if (isset($records->basic_phone_2)) echo $records->basic_phone_2 ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
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
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
              </div>
              <!--/.col (right) -->
  </div>
  </section>
  </form>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->