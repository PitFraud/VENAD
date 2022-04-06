<div class="content-wrapper">
  <section class="content-header">
    <h1>
      State Login
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>District_login/"><i class="fa fa-dashboard"></i>District Login</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="row">
    <div class="box">
      <div class="box-header">
        <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
          <a href="<?php echo base_url();?>StateLogin/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>Add State Login</a>
        <div class="">
          <div class="box-body table-responsive">
            <table id="StateLoginTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>State name</th>
                  <th>Username</th>
                  <th>Password</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
