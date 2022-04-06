<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dynamic input boxes adding
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Vehicles/"><i class="fa fa-dashboard"></i> Back To Vehicles</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <div class="row">
    <div class="box">

      <div class="container">
        <div class="form-group">
          <form class="form-control" action="" method="post" name="add_name" id="add_name">
            <table class="table table-bordered" id="dynamic_field">
              <tr>
                <td> <input type="text" name="name[]" id="name" value="" placeholder="Enter name"> </td>
                <td> <button name="add" id="add" class="btn btn-success">Add</button></td>
              </tr>
            </table>
            <button type="submit" name="submit">Submit</button>
          </form>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>
</div>
