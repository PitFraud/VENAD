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
      Member Information
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>ChangePassword/"><i class="fa fa-dashboard"></i>Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="">
         <?php if ($this->session->flashdata('message')) echo '<script> new swal("'.$this->session->flashdata('message').'")</script>'; ?>
</div>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>ChangePassword/changeUserPassword" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          </div>
          <div class="box-body"><div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title"><b>CHANGE PASSWORD</b></h3>
              </div>
              <div class="panel-body" style="font-weight:bold;">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="fsize">Old password</label>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                    <input type="password" name="old_password" value="" placeholder="Enter old password" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="fsize">New password</label>
                    <input type="password" name="new_password" value="" placeholder="Enter new password" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="fsize">Confirm password</label>
                    <input type="password" name="confirm_password" value="" placeholder="Confirm new password" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn btn-danger" onclick="window.location.reload();">Cancel</button>
                  <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
      </div>
    </section>
  </form>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
