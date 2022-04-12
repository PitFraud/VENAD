<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Member Login
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Mlogin/"><i class="fa fa-dashboard"></i>Member Login</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="row">
    <div class="box">
      <div class="box-header">
        <div class="col-md-8">
          <h2 class="box-title"></h2>
        </div>
        <!-- <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" /> -->
        <?php if (!empty($this->session->flashdata('response'))) echo "<script>swal('" . $this->session->flashdata('response') . "')</script>"; ?>
        <a href="<?php echo base_url(); ?>Mlogin/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>Add Member Login</a>
        <div class="">
          <div class="box-body table-responsive">
            <table id="MemberLoginTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Name</th>
                  <th>Id</th>
                  <th>User Type</th>
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