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
      State Information
         <small id="date" class="col-md-4"></small>
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>State/"><i class="fa fa-dashboard"></i> Back to List</a></li>
        <li class="active"></li>
      </ol>
    </section>

     <!-- Main content -->
     <form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/State/add" enctype="multipart/form-data">
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
                  <h3 class="panel-title"><b>NEW STATE</b></h3>
                </div>
                  <div class="panel-body" style="font-weight:bold;">

            

                  <input type="hidden" name="state_id" value="<?php if(isset($records->state_id)) echo $records->state_id ?>"/>

               

              <div class="form-group row">
                                
                <div class="col-md-6">
                  <label class="fsize">State Name</label>
                  <input type="text" data-pms-required="true" autofocus class="form-control" name="state_name"  value="<?php if(isset($records->state_name)) echo $records->state_name ?>">
                </div> 
                
              </div>

              <div class="form-group row">

                <div class="col-md-6">
                  <label class="fsize">Phone Number</label>
                  <input type="text" data-pms-required="true" autofocus class="form-control" name="state_number"  value="<?php if(isset($records->state_number)) echo $records->state_number ?>">
                </div>

                <div class="col-md-6">
                  <label class="fsize">Incharge</label>
                  <input type="text" data-pms-required="true" autofocus class="form-control" name="state_incharge"  value="<?php if(isset($records->state_incharge)) echo $records->state_incharge ?>">
                </div>

              </div><!--form-group--><br>

             
            
           
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






