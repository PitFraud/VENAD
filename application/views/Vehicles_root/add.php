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
    Vehicle Rout Map 
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Vehicles/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Vehicles_root/add" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
          <div class="box-header">
            <div class="col-md-8"><h2 class="box-title"></h2> </div>
          </div>
          <div class="box-body">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Rout Map</b></h3>
                  <!-- <div class="col-md-6"> -->
                  </div>
                 <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <input type="hidden" name="vroot_id" value="<?php if(isset($records->root_id)) echo $records->root_id; ?>"/>
                           <?php echo validation_errors(); ?>
                  
                     
                        <div class="col-md-4">
                           <label class="fsize">Vehicle Name</label>
                       <select name="vehicle_id_fk" class="form-control" style="font-weight: bold;">
                        <option value="">-SELECT-</option>
                        <?php foreach($vehicle as $item){?>
                          <option value="<?php echo $item->vehicle_id; ?>"><?php echo $item->vehicle_name; ?></option>
                        <?php } ?>
                       </select>
                        </div>

                           <div class="col-md-4">
                           <label class="fsize">Driver Name</label>
                       <select name="driver_id_fk" class="form-control" style="font-weight: bold;">
                        <option value="">-SELECT-</option>
                        <?php foreach($driver as $items){?>
                          <option value="<?php echo $items->driver_id; ?>"><?php echo $items->driver_name; ?></option>
                        <?php } ?>
                       </select>
                        </div>

                   
                    
                        <div class="col-md-4">
                           <label class="fsize">Date</label>
                         <input type="date" data-pms-required="true" autofocus class="form-control" name="cdate"  value="<?php if(isset($records->date)) echo $records->date ?>" style="font-weight: bold;">
                        </div>

                    </div>

                    <div class="form-group">
                         <div class="col-md-12">
                           <label class="fsize">Rout Details</label>
                           <textarea class="form-control" name="vroot_details" rows="5" style="font-weight: bold;"><?php if(isset($records->vroot_details)) echo $records->vroot_details ?></textarea>
                       
                        </div>
                    </div>

                       <h4>Item Details</h4>

             <div class="box-body table-responsive">
             <!-- <table id="classinfo_table" class="table table-bordered table-striped">-->
                 <table class="table table-bordered table-striped" style="border:ridge;">
                <thead>
                <tr>
                  <th style="border:ridge;">Sl.No</th>
                  <th style="border:ridge;">Products</th>
                  <th style="border:ridge;">Weight</th>
                   <th style="border:ridge;">Unit</th>
                  <th style="border:ridge;">Total Weight</th>
                   <th style="border:ridge;">Damage</th>
                  <th style="border:ridge;">Balance</th>
                 
                </tr>
                </thead>
                <tbody>
                   <?php 
                  $i=0;
                  foreach ($products as $value) {
                  $i = $i+1;
                  ?>
                  <tr style="border:ridge;font-weight: bold;" id="item<?php echo $i; ?>">
                    <td style="border:ridge;font-size:16px;width: 10px;"><?php echo $i; ?></td>
                    <td style="border:ridge;font-size:16px;width: 150px;"> <?php echo $value->item_name; ?>
                    <input type="hidden" name="item_id[]" value="<?php echo $value->item_id; ?>">

                    </td>
                     <td style="width: 150px;">
                         <input type="text" autofocus class="form-control" name="weight[]" id="weight<?php echo $i; ?>">
                       
                        </td>

                          <td style="width: 150px;">
                         <input type="text" autofocus class="form-control" name="unit[]" id="unit<?php echo $i; ?>">
                       
                        </td>

                          <td style="width: 150px;">
                         <input type="text" autofocus class="form-control" name="tweight[]" id="tweight<?php echo $i; ?>">
                       
                        </td>

                         <td style="width: 150px;border:ridge;"><!---hds month pricipal-->
                           <input type="text" autofocus class="form-control" name="damage_weight[]" id="damage_weight<?php echo $i; ?>">
                        </td>

                         <td style="width: 150px;border:ridge;"><!---hds month pricipal-->
                           <input type="text" autofocus class="form-control" name="balance[]" id="balance<?php echo $i; ?>">
                        </td>

                       
                  </tr>
                <?php } ?>
                </tbody>
               
              </table>
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
                    <button type="submit" class="btn btn-primary">Add Vehicle</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
