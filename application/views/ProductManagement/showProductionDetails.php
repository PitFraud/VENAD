<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Production Details
      <small id="date" class="col-md-4"></small>
      <!-- <small>Optional description</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Panchayath/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
      <li class="active"></li>
    </ol>
  </section>
  <!-- Main content -->
    <div class="row">
      <div class="box">
        <div class="box-header">
           <div class="col-md-8"><h2 class="box-title"></h2> </div>
          <!-- <button type="button" class="btn btn-primary" name="button">Add allotment</button> -->
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <a href="<?php echo base_url();?>ProductManagement/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add Product Item</a>
            <a href="<?php echo base_url();?>ProductManagement/addProductionDetails" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Production Details</a>

          <div class="">
            <div class="box-body table-responsive">
            <table id="productionDetailsTable" class="table table-bordered table-striped table-responsive">
              <thead>
              <tr>
                <th>Sl.No</th>
                <th>Product name</th>
                <th>Production Code</th>
                <th>Manufacturing date</th>
                <th>Expiry date</th>
                <th>Quantity</th>
                <th>Raw material used</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Date&Time</th>
                <th>Qr Code</th>
                <th>Barcode</th>
                
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
          <!-- <div class="col-md-8"><h2 class="box-title"></h2> </div> -->
        </div>
        </div>
      </div>
    </div>
</div>

<input type="hidden" name="image1" value="" >

<div class="modal fade" id="showQrModal" role="dialog">
   <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">SCAN QR CODE</h4>
       </div>
       <div class="modal-body">
         <img src="" alt="" id="qr_image">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>

 <div class="modal fade" id="showBarcodeModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SCAN BARCODE</h4>
        </div>
        <div class="modal-body">
          <img src="" alt="" id="barcode_image" width="500px" height="150px;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
