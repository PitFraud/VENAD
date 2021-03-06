 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Feed Chart Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Purchasereport"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">Purchase Report</li>
      </ol>
    </section>
     <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="input-group margin">
					<div class="input-group-btn">
					<button type="button" class="btn btn-primary nohover">Date </button>
					</div><!-- /btn-group -->
					<input id="pmsDateStart" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
					<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
						
					<input id="pmsDateEnd" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
					<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
				</div>
			</div>
					
			<div class="col-sm-1">
					<div class="input-group">
						<button type="button" id="search" class="btn bg-orange btn-flat margin" onclick="<?php if(isset($values->mainhead_id))echo $values->mainhead_id;?>">Search</button>
					</div>
			</div>
			<div class="col-sm-1">
				<div class="input-group">
					<a href="<?php echo base_url();?>purchase"><button class="btn bg-navy btn-flat margin" >Refresh</button></a>
				</div>
			</div>
		</div>
		<div class="row">
        <div class="box">
            <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <div class="col-md-8"><h2 class="box-title"></h2> </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="allotment_chart" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>SINO</th>
					<th>FEED CONSUMTION PER BIRD</th>
                    <th>CUMULATIVE CONSUMTION PER BIRD</th>
					<th>AVERAGE WEIGHT PER BIRD</th>
                    <th>AVERAGE WEIGHT PER BIRD(KG)</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
	</div>
   </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
