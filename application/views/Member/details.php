<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Member Information
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Member/add"><i class="fa fa-dashboard"></i> Back To Add</a></li>
        <li class="active"></li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
	<div class="row">
						
			<div class="col-sm-1">
					
			</div>
			
		</div>
	
		<div class="row">	
        <div class="box">
            <div class="box-header">
						
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <div class="col-md-8"><h2 class="box-title"></h2> </div>			
				
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <center><img src="<?php echo base_url();?>/uploads/<?php echo $records[0]->member_img?>" width="100px" height = "100px"/></center>
              <center>
                <table width="300px" height="500px">
                  <tr>
                   <td><strong>Name:</strong></strong></td><td><strong> <?php if(isset($records[0]->member_name)) { echo $records[0]->member_name; }?></strong></strong></td>
                  </tr>
                  <tr>
                   <td><strong>Reg.No:</strong></td><td> <strong><?php if(isset($records[0]->member_mid)) { echo $records[0]->member_mid; }?></strong></td>
                   </tr>
                   <tr>
                   <td><strong>Address:</td><td><strong><?php if(isset($records[0]->member_address)) { echo $records[0]->member_address; }?></td></tr>
                   <tr><td>
                  <strong>Age:</strong></td><td> <strong><?php if(isset($records[0]->member_age)) { echo $records[0]->member_age; }?></strong></td></tr>
                  <tr><td>
                   <strong>FatherName:</strong></td><td> <strong><?php if(isset($records[0]->member_mid)) { echo $records[0]->member_mid; }?></strong></td></tr>
                   <tr><td>
                 <strong>  DOB:</strong></td><td> <strong><?php if(isset($records[0]->member_dob)) { echo $records[0]->member_dob; }?></strong></td></tr>
                   <tr><td>
                   <strong>Adhar No:</strong></td><td> <strong><?php if(isset($records[0]->member_aadhaar)) { echo $records[0]->member_aadhaar; }?></strong></td></tr><tr>
                   <td><strong>Qualificatio:</strong></td><td><strong> <?php if(isset($records[0]->member_education)) { echo $records[0]->member_education; }?></strong></td></tr>
                   <tr><td>
                   <strong>Relegion:</strong> </td><td><strong><?php if(isset($records[0]->member_religion)) { echo $records[0]->member_religion; }?></strong></td></tr><tr>
                    <td>
                  <strong> Category:</strong> </td><td><strong><?php if(isset($records[0]->member_category)) { echo $records[0]->member_category; }?></strong></td></tr><tr>
                  <td> <strong>Bank:</strong></td><td> <strong><?php if(isset($records[0]->member_bank)) { echo $records[0]->member_bank; }?></strong></td></tr><tr>
                   <td><strong>Branch:</strong></td><td><strong><?php if(isset($records[0]->member_branch)) { echo $records[0]->member_branch; }?></strong></td></tr>
                 </table>
             </center>

                          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
     </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






