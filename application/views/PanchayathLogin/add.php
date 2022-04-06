

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Panchayath Login Information
       <small id="date" class="col-md-4"></small>
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>PanchayathLogin/"><i class="fa fa-dashboard"></i> Back to List</a></li>
        <li class="active"></li>
      </ol>
    </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/PanchayathLogin/add" enctype="multipart/form-data">
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
          <input type="hidden" name="id" value="<?php if(isset($records->id)) echo $records->id ?>"/>
          <?php echo validation_errors(); ?>
          <label for="inputEmail3" class="col-sm-2 control-label"></label>
                </div>
            <div class="box-body">
                <div class="form-group">
                 <label for="size_name" class="col-sm-2 control-label">Panchayath <span style="color:red"></span></label>
           <div class="col-sm-3">
<input type="hidden"  id="id" value="<?php if(isset($records->user_name)) echo $records->user_name; ?>"/>
<select class="form-control select2" id="cag" name="panchayath_id"   data-pms-type="dropDown">
<option value="">--Please Select</option>
<?php
 if(isset($records->id)){$re=$records->mem_id;}
foreach($panchayath as $row){
  $new=$row->panchayath_id;
?>
<option <?php if(isset($records->id)){if($new==$re){echo "selected";}} ?> value="<?php echo $row->panchayath_id;  ?>"><?php echo $row->panchayath_name;  ?></option>
<?php
}

?>
</select>

</div>
<button class="btn btn-success" data-toggle="modal" data-target="#myPachayat">Add Panchayat</button>
</div>
<div class="form-group">

          <label for="size_name" class="col-sm-2 control-label">Username<span style="color:red"></span></label>

                  <div class="col-sm-3">
                    <input type="text" data-pms-required="true" autofocus class="form-control" name="user_name"  value="<?php if(isset($records->user_name)) echo $records->user_name ?>">
                  </div>
        </div> 
 <div class="form-group">

          <label for="size_name" class="col-sm-2 control-label">Password<span style="color:red"></span></label>

                  <div class="col-sm-3">
                    <input type="text" data-pms-required="true" autofocus class="form-control" name="password"  value="<?php if(isset($records->password)) echo $records->password ?>">
                  </div>
        </div> 
         
        
        
        
            </div>
              <!-- /.box-body -->
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
          <!-- /.box -->
          
        </div>
        <!--/.col (right) -->
     </div>

    </section>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






  <div id="myPachayat" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Panchayat Information</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() ?>PanchayathLogin/addPanchayat" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Panchayat Name</label>
          <input type="text" class="form-control" placeholder="Enter Panchayat Name" autofocus name="panchayat">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">District</label>
          <select name="district" id="" class="form-control">
            <option value="">SELECT DISTRICT</option>
            <?php foreach($districts as $d_list){ ?>
              <option value="<?php echo $d_list->district_id ?>"><?php echo $d_list->district_name ?></option>
            <?php } ?>  
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <textarea name="address" id="" cols="30" rows="4" class="form-control" placeholder="Enter Address"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="text" name="p_num" class="form-control" placeholder="Enter Phone Number">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Incharge</label>
          <input type="text" name="incharge" class="form-control" placeholder="Enter Incharge Name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>