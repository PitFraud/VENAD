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
      District Information
         <small id="date" class="col-md-4"></small>
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>District/"><i class="fa fa-dashboard"></i> Back to List</a></li>
        <li class="active"></li>
      </ol>
    </section>

     <!-- Main content -->
     <form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/District/add" enctype="multipart/form-data">
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
                  <h3 class="panel-title"><b>NEW DISTRICT</b></h3>
                </div>
                  <div class="panel-body" style="font-weight:bold;">

            

                  <input type="hidden" name="district_id" value="<?php if(isset($records->district_id)) echo $records->district_id ?>"/>

               

              <div class="form-group row">
                                
                <div class="col-md-6">
                  <label class="fsize">District Name</label>
                  <input type="text" data-pms-required="true" autofocus class="form-control" name="district_name"  value="<?php if(isset($records->district_name)) echo $records->district_name ?>">
                </div> 
                
                <div class="col-md-6">
                  <label class="fsize">STATE</label>
                  <select name="district_state" class="form-control" id="district_state">
                      <option value="">-SELECT STATE-</option>
                      <?php foreach($state as $state){?>
                        <option <?php if(isset($records->district_state_id_fk)){if($records->district_state_id_fk==$state->state_id){echo "selected";}} ?>  value="<?php echo $state->state_id; ?>"><?php echo $state->state_name; ?></option>
                      <?php } ?>
                  </select>
                </div>

              </div><!--form-group--><br>

            

             <!-- <div class="form-group row">

                <div class="col-md-8">
                  <label class="fsize">Address </label>
                  <textarea autofocus class="form-control" name="district_address" ><?php if(isset($records->district_address)) echo $records->district_address ?></textarea>
                </div>

               
              </div><br>-->

              <div class="form-group row">

                <div class="col-md-6">
                  <label class="fsize">Phone Number</label>
                  <input type="text" data-pms-required="true" autofocus class="form-control" name="district_number"  value="<?php if(isset($records->district_number)) echo $records->district_number ?>">
                </div>

                <div class="col-md-6">
                  <label class="fsize">Incharge</label>
                  <input type="text" data-pms-required="true" autofocus class="form-control" name="district_incharge"  value="<?php if(isset($records->district_incharge)) echo $records->district_incharge ?>">
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






