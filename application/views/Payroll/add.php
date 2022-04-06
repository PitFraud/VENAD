<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payroll Form
        <small id="date" class="col-md-4"></small>
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Product/"><i class="fa fa-dashboard"></i> Back to List</a></li>
        <li class="active">Payroll Form</li>
      </ol>
    </section>

     <!-- Main content -->
	<form class="form-horizontal" method="POST" action="<?php echo base_url();?>Payroll/add"> 
    
	<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
			
				<input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
			<!-- radio -->
				<div class="box-body">
					 <div class="col-lg-2"></div>
              <div class="col-lg-8">
             <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Employee Payroll Form</b></h3>
                </div>
                  <div class="panel-body" style="font-weight: bold;">
						<div class="form-group">
							
							<div class="col-md-6">
								<label>Employee Name<span style="color:red">*</span></label>
								<?php echo form_dropdown('emp_id', $staffnames, '', 'id="payroll_empname" class="form-control"  data-pms-required="true" data-pms-type="dropDown"', 'name="emp_id"');?>
							</div>
						</div>
						<div class="form-group">
						
							<div class="col-md-6">
								<label for="exampleInputEmail1">Month<span style="color:red">*</span></label>
								<select class="form-control" name="payroll_salmonth" id="payroll_salmonth">
									<option>----Please Select----</option>
									<option value="01">January</option>
									<option value="02">February</option>
									<option value="03">March</option>
									<option value="04">April</option>
									<option value="05">May</option>
									<option value="06">June</option>
									<option value="07">July</option>
									<option value="08">August</option>
									<option value="09">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
						
							
							<div class="col-md-6">
								<label>Salary Date <span style="color:red">*</span></label>
								<input type="text" placeholder="dd/mm/yyyy" id="payroll_salarydate" name="payroll_salarydate" class="form-control" required="required">
							</div>
						</div>
						<div class="form-group">
							
							<div class="col-md-6">
								<label>Basic Salary</label>
								<input type="text" readonly style="background-color: white;" placeholder="Basic Salary" id="basic_sal" name="basic_sal" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							
							<div class="col-md-6">
								<label>EPF</label>
								<input type="text"  placeholder="EPF" id="epf_sal" name="epf_sal" class="form-control" >
							</div>
						
							
							<div class="col-md-6">
								<label>HRA</label>
								<input type="text"  placeholder="HRA" id="payroll_hra" name="payroll_hra" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							
							<div class="col-md-6">
								<label>ESI</label>
								<input type="text"  placeholder="ESI" id="payroll_esi" name="payroll_esi" class="form-control" >
							</div>
						
							<div class="col-md-6">
								<label>TA</label>
								<input type="text"  placeholder="TA" id="payroll_ta" name="payroll_ta" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							
							<div class="col-md-6">
								<label>Overtime Amt</label>
								<input type="text" readonly style="background-color: white;" placeholder="Overtime Amount" id="overtime" name="overtime" value="0" class="form-control" >
							</div>
						
							
							<div class="col-md-6">
								<label>Advance Amt</label>
								<input type="text" readonly style="background-color: white;" placeholder="Advance Amount" id="advance" name="advance" value="0" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							
							<div class="col-md-6">
								<label>Leave Deduction</label>
								<input type="text" readonly style="background-color: white;" placeholder="Deduct Amount" id="leave_ded" name="leave_ded" value="0" class="form-control" >
							</div>
							<div class="col-sm-2">
								<strong><span>No.of days : <span id="days"></span></span></strong>
							</div>
						</div>
						<div class="form-group">
							
							<div class="col-md-6">
								<label>Total Salary</label>
								<input type="text" placeholder="Total Amount" id="total_sal" name="total_sal" class="form-control" >
							</div>
						</div>
				</div>
			</div></div></div>
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
        <!-- /.col -->
        </div>

	
    </section>
		
	</form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


