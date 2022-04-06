<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Financial Year Form
        <small id="date" class="col-md-4"></small>
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>FinYear/"><i class="fa fa-dashboard"></i> Back to View</a></li>
        <li class="active">Financial Year Form</li>
      </ol>
    </section>

     <!-- Main content -->
	<form class="form-horizontal" method="POST" action="<?php echo base_url();?>FinYear/add" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
		  <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <div class="box-header with-border">
              <h3 class="box-title">Set Financialyear</h3>
            </div>
            <!-- radio -->
               <div class="form-group">
			   <input type="hidden" name="finyear_id" value="<?php if(isset($records->finyear_id)) echo $records->finyear_id ?>"/>
                <?php echo validation_errors(); ?>
                 <label for="inputEmail3" class="col-sm-2 control-label"></label>
                 
                </div>
				<div class="box-body">
					<div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Financial Year <span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" data-pms-required="true"  class="form-control" name="fin_year" placeholder="Ex: 2016 - 2017" value="<?php if(isset($records->fin_year)) echo $records->fin_year ?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">No of Share Holders<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" required  class="form-control" name="share_holder" id="share_hold" placeholder="Enter No of Shareholders" value="<?php if(isset($records->fin_no_of_share_holders)) echo $records->fin_no_of_share_holders ?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Share Capitals<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" required  class="form-control" name="share_cap" id="share_cap" placeholder="Enter Share Capitals" value="<?php if(isset($records->fin_share_capital)) echo $records->fin_share_capital ?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Business Turnover<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" required  class="form-control" name="business_turnover" id="business_turnover" placeholder="Enter Business Turnover" value="<?php if(isset($records->fin_business_turn_over)) echo $records->fin_business_turn_over ?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Income Tax Period<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" required  class="form-control" name="income_tax_period" id="income_tax_period" placeholder="Enter Income Tax Period" value="<?php if(isset($records->fin_income_tax_period)) echo $records->fin_income_tax_period ?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Net Profit<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" required  class="form-control" name="net_profit" id="net_profit" placeholder="Enter Net Profit" value="<?php if(isset($records->fin_net_profit)) echo $records->fin_net_profit ?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Percentage Bonus<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" required  class="form-control" name="percentage_bonus" id="percentage_bonus" placeholder="Enter Percentage Bonus %" value="<?php if(isset($records->fin_per_bonus)) echo $records->fin_per_bonus ?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Divident Bonus<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" required  class="form-control" name="divident_bonus" id="divident_bonus" placeholder="Enter Divident Bonus %" value="<?php if(isset($records->fin_divident_bonus)) echo $records->fin_divident_bonus ?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Audit Report Upload<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="file" required  class="form-control" name="audit_report" id="audit_report" placeholder="Upload Audit Report" value="<?php if(isset($records->fin_divident_bonus)) echo $records->fin_divident_bonus ?>" accept="application/pdf">
            <small><span style="color:red">Upload PDF only</span></small>
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">Start Date<span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text" required  class="form-control" name="start_date" id="start_date"  value="<?php if(isset($records->fin_startdate)){ $start_date = str_replace('-', '/', $records->fin_startdate); $start_date =  date("d/m/Y",strtotime($start_date));  echo $start_date; }?>">
					  </div>
				  </div>
          <div class="form-group">
					  <label for="size_name" class="col-sm-4 control-label">End date <span style="color:red">*</span></label>
					  <div class="col-sm-4">
						<input type="text"  required  class="form-control" name="end_date" id="end_date"  value="<?php if(isset($records->fin_enddate)){ $end_date = str_replace('-', '/', $records->fin_enddate); $end_date =  date("d/m/Y",strtotime($end_date));  echo $end_date; }?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-6 control-label">
					<input type="Checkbox" name="currentfn" value="1" <?php if(isset($records->fin_status)){if($records->fin_status=='A'){echo "checked=checked" ;}}?>/>&nbsp;&nbsp;Set As Current FinancialYear
					</label>
				</div>

                </div>
              <!-- /.box-body -->
          </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      </div>
    </section>
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
	</form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






