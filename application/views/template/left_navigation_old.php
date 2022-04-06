 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="margin-top:50px">
	<!-- Sidebar Menu -->
      <ul class="sidebar-menu" id="navi">
        <!--<li class="header"></li>-->
        <!-- Optionally, you can add icons to the links -->
		<?php if($this->session->userdata['user_type']=='A'){ ?>
		<li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>	
		<li class="treeview <?php 
			 if($this->uri->segment(1)=="Shopinfo")
                {echo "active";}
			else if($this->uri->segment(1)=="FinYear")
                {echo "active";}
			
		    ?>">
          <a><i class="fa fa-gear"></i><span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="Shopinfo"){echo "active";}?>" ><a href="<?php echo base_url();?>Shopinfo"><i class="fa fa-circle-o"></i><span>Branch Information</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="FinYear"){echo "active";}?>" ><a  href="<?php echo base_url();?>FinYear"><i class="fa fa-circle-o"></i> <span>Financial Year</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Changepass"){echo "active";}?>" ><a  href="<?php echo base_url();?>Changepass/add"><i class="fa fa-circle-o"></i> <span>Change Password</span></a></li>
		</ul>
        </li>
		<li class="treeview <?php 
		
			 if($this->uri->segment(1)=="Member")
                {echo "active";}
			else if($this->uri->segment(1)=="Group")
                {echo "active";}
			else if($this->uri->segment(1)=="Panchayath")
                {echo "active";}
			else if($this->uri->segment(1)=="Region")
                {echo "active";}
			else if($this->uri->segment(1)=="President")
                {echo "active";}
			else if($this->uri->segment(1)=="Secratary")
                {echo "active";}
			
			else if($this->uri->segment(1)=="Treasurer")
                {echo "active";}
			else if($this->uri->segment(1)=="Animator")
                {echo "active";}
			
            //else if($this->uri->segment(1)=="Project")
               // {echo "active";}
		    ?>">
          <a><i class="fa fa-users"></i><span>Community Action Group</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
			<li class="<?php if($this->uri->segment(1)=="Member"){echo "active";}?>" ><a  href="<?php echo base_url();?>Member"><i class="fa fa-circle-o"></i> <span>Member</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Group"){echo "active";}?>" ><a  href="<?php echo base_url();?>Group"><i class="fa fa-circle-o"></i> <span>Group</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Panchayath"){echo "active";}?>" ><a  href="<?php echo base_url();?>Panchayath"><i class="fa fa-circle-o"></i> <span>Panchayath</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Region"){echo "active";}?>" ><a  href="<?php echo base_url();?>Region"><i class="fa fa-circle-o"></i> <span>Region</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="President"){echo "active";}?>" ><a href="<?php echo base_url();?>President"><i class="fa fa-circle-o"></i><span>President</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Secratary"){echo "active";}?>" ><a  href="<?php echo base_url();?>Secratary"><i class="fa fa-circle-o"></i> <span>Secretary</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Treasurer"){echo "active";}?>" ><a  href="<?php echo base_url();?>Treasurer"><i class="fa fa-circle-o"></i> <span>Treasurer</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Animator"){echo "active";}?>" ><a  href="<?php echo base_url();?>Animator"><i class="fa fa-circle-o"></i> <span>Animator</span></a></li>
			
		</ul>
        </li>
		<li class="treeview <?php 

              if($this->uri->segment(1)=="Deposit")
                {echo "active";}
			 else if($this->uri->segment(1)=="Loan")
                {echo "active";}
			else if($this->uri->segment(1)=="AWCLoan")
                {echo "active";}
			else if($this->uri->segment(1)=="Linkingloan")
                {echo "active";}
			else if($this->uri->segment(1)=="Enterpriseloan")
                {echo "active";}
		    ?>">
			
          <a><i class="fa fa-money"></i><span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
			<ul class="treeview-menu ">
				<li class="<?php if($this->uri->segment(1)=="Deposit"){echo "active";}?>" ><a  href="<?php echo base_url();?>Deposit"><i class="fa fa-circle-o"></i> <span>Deposit</span></a></li>
				<li class="treeview 
			<?php 
			if($this->uri->segment(1)=="Loan")
                {echo "active";}
			else if($this->uri->segment(1)=="AWCLoan")
                {echo "active";}
			else if($this->uri->segment(1)=="Linkingloan")
                {echo "active";}
			else if($this->uri->segment(1)=="Enterpriseloan")
                {echo "active";}
			else if($this->uri->segment(1)=='Voucherhead')
                {echo "active";}
			else if($this->uri->segment(1)=='Receipthead')
                {echo "active";}
			else if($this->uri->segment(1)=='Voucher')
                {echo "active";}
			else if($this->uri->segment(1)=='Receipt')
                {echo "active";}
			else if($this->uri->segment(1)=="Daybook")
                {echo "active";}
			else if($this->uri->segment(1)=="Ledger")
                {echo "active";}
            else if($this->uri->segment(1)=="Balancesheet")
                {echo "active";}
                ?>">
                

              <a href="#"><i class="fa fa-circle-o"></i> Loan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <li class="<?php if($this->uri->segment(1)=="Loan"){echo "active";}?>" ><a  href="<?php echo base_url();?>Loan"><i class="fa fa-circle-o"></i> <span>Group Loan</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="AWCLoan"){echo "active";}?>" ><a  href="<?php echo base_url();?>AWCLoan"><i class="fa fa-circle-o"></i> <span>AWC Loan</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Linkingloan"){echo "active";}?>" ><a  href="<?php echo base_url();?>Linkingloan"><i class="fa fa-circle-o"></i> <span>Linking Loan</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Enterpriseloan"){echo "active";}?>" ><a  href="<?php echo base_url();?>Enterpriseloan"><i class="fa fa-circle-o"></i> <span>Enterprise Loan</span></a></li>
				 </ul>
			</li>
			<li class="treeview 
			<?php 
			if($this->uri->segment(1)=='Voucherhead')
                {echo "active";}
			else if($this->uri->segment(1)=='Receipthead')
                {echo "active";}
                ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Create account heads
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <li class="<?php if($this->uri->segment(1)=='Voucherhead'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucherhead"><i class="fa fa-circle-o"></i>Voucher</a></li>
				<li class="<?php if($this->uri->segment(1)=='Receipthead'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipthead"><i class="fa fa-circle-o"></i>Receipt</a></li>
			  </ul>
			</li>	
			
			<li class="<?php if($this->uri->segment(1)=='Voucher' && $this->uri->segment(2)=='create'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucher"><i class="fa fa-circle-o"></i>Voucher Entry</a></li>
			<li class="<?php if($this->uri->segment(1)=='Receipt' && $this->uri->segment(2)=='create'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipt"><i class="fa fa-circle-o"></i>Receipt Entry</a></li>  
			<li class="<?php if($this->uri->segment(1)=="Daybook"){echo "active";}?>" ><a  href="<?php echo base_url();?>Daybook"><i class="fa fa-circle-o"></i> <span>Daybook</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="fa fa-circle-o"></i> <span>Ledger</span></a></li>

			<li class="<?php if($this->uri->segment(1)=="Balancesheet"){echo "active";}?>" ><a  href="<?php echo base_url();?>Balancesheet"><i class="fa fa-circle-o"></i> <span>Balance Sheet</span></a></li>
				

			<li class="<?php if($this->uri->segment(1)=="Balancesheet"){echo "active";}?>" ><a  href="<?php echo base_url();?>Income"><i class="fa fa-circle-o"></i> <span>Income And Expenditure A/c</span></a></li>
			</ul>
        </li>
		
		<li class="treeview <?php 
			if($this->uri->segment(1)=="User")
                {echo "active";}
            else if($this->uri->segment(1)=="Customer")
                {echo "active";}
			else if($this->uri->segment(1)=="Vendor")
                {echo "active";}
			else if($this->uri->segment(1)=="Taxdetails")
                {echo "active";}
			?>">
          <a><i class="fa fa-laptop"></i><span>Administration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="User"){echo "active";}?>" ><a  href="<?php echo base_url();?>User"><i class="fa fa-circle-o"></i> <span>User Management</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Customer"){echo "active";}?>" ><a href="<?php echo base_url();?>Customer"><i class="fa fa-circle-o"></i> <span>Customer details</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Vendor"){echo "active";}?>" ><a href="<?php echo base_url();?>Vendor"><i class="fa fa-circle-o"></i> <span>Vendor details</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Taxdetails"){echo "active";}?>" ><a href="<?php echo base_url();?>Taxdetails"><i class="fa fa-circle-o"></i> <span>Tax details</span></a></li>
		</ul>
        </li>
		
		<li class="treeview <?php 
			if($this->uri->segment(1)=="Employee")
                {echo "active";}
			else if($this->uri->segment(1)=="Emp_attendence")
                {echo "active";}
			else if($this->uri->segment(1)=="Advancepayments")
                {echo "active";}
			else if($this->uri->segment(1)=="Overtime")
                {echo "active";}
			else if($this->uri->segment(1)=="Payroll")
                {echo "active";}
			else if($this->uri->segment(1)=="Payslip")
                {echo "active";}
			?>">
          <a><i class="fa fa-industry"></i><span>HR Department</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
			<li class="<?php if($this->uri->segment(1)=="Employee"){echo "active";}?>" ><a  href="<?php echo base_url();?>Employee"><i class="fa fa-circle-o"></i> <span>Employee  Details</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Emp_attendence"){echo "active";}?>" ><a href="<?php echo base_url();?>Emp_attendence"><i class="fa fa-circle-o"></i> <span>Employee Attendance</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Advancepayments"){echo "active";}?>" ><a href="<?php echo base_url();?>Advancepayments"><i class="fa fa-circle-o"></i> <span>Advance Payments</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Overtime"){echo "active";}?>" ><a href="<?php echo base_url();?>Overtime"><i class="fa fa-circle-o"></i> <span>Overtime Details</span></a></li>
			 <li class="<?php if($this->uri->segment(1)=="Payroll"){echo "active";}?>" ><a href="<?php echo base_url();?>Payroll"><i class="fa fa-circle-o"></i> <span>Payroll</span></a></li>
		</ul>
        </li>
        <li class="treeview <?php 
			//if($this->uri->segment(1)=="Projectinfo")
               //		   {echo "active";}
		   if($this->uri->segment(1)=="Project")
                 {echo "active";}
			else if($this->uri->segment(1)=="Purchase")
                {echo "active";}
			else if($this->uri->segment(1)=="PPurchase")
                {echo "active";}
			else if($this->uri->segment(1)=="PSale")
                {echo "active";}
			?>">
          <a><i class="fa fa-industry"></i><span>Project</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
			<ul class="treeview-menu ">
				<li class="<?php if($this->uri->segment(1)=="Project"){echo "active";}?>" ><a  href="<?php echo base_url();?>Project"><i class="fa fa-shopping-cart"></i> <span>Project</span></a></li>
				<!--<li class="<?php if($this->uri->segment(1)=="PSale"){echo "active";}?>" ><a  href="<?php echo base_url();?>PSale"><i class="fa fa-cart-plus"></i> <span>Sale</span></a></li>-->
				
			</ul>
        </li>
		<li class="treeview <?php 
			
		   if($this->uri->segment(1)=="Purchasereport")
                 {echo "active";}
			else if($this->uri->segment(1)=="Salereport")
                {echo "active";}
			else if($this->uri->segment(1)=="Member_report")
                {echo "active";}
			else if($this->uri->segment(1)=="Monthlyreport")
                {echo "active";}
			
			?>">
          <a><i class="fa fa-line-chart"></i><span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
			<ul class="treeview-menu ">
				<li class="<?php if($this->uri->segment(1)=="Purchasereport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Purchasereport"><i class="fa fa-file-text-o"></i> <span>Purchase Report</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Salereport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Salereport"><i class="fa fa-file-text-o"></i> <span>Sale Report</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Member_report"){echo "active";}?>" ><a  href="<?php echo base_url();?>Member_report"><i class="fa fa-file-text-o"></i> <span>Member Report</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Attendancereport"){echo "active";}?>" >
				<a><i class="fa fa-file-text-o"></i><span>Attendance Report</span>
            	<span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            	</span>
          		</a>
					<ul class="treeview-menu ">
						<li class="<?php if($this->uri->segment(1)=="Dailyreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>DailyAttendancereport"><i class="fa fa-file-text-o"></i> <span>Daily Report</span></a></li>
						<li class="<?php if($this->uri->segment(1)=="Monthlyreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Monthlyreport"><i class="fa fa-file-text-o"></i> <span>Monthly Report</span></a></li>
					</ul>
				</li>
				
				
			</ul>
        </li>
		<li class="treeview <?php 
			if($this->uri->segment(1)=="Product")
                {echo "active";}
			else if($this->uri->segment(1)=="Purchase")
                {echo "active";}
			else if($this->uri->segment(1)=="Stockmovement")
                {echo "active";}
			else if($this->uri->segment(1)=="Stockdetails")
                {echo "active";}
			else if($this->uri->segment(1)=="Sale")
                {echo "active";}
			else if($this->uri->segment(1)=="Expense")
                {echo "active";}
			else if($this->uri->segment(1)=="Department")
                {echo "active";}
			?>">
          <a><i class="fa fa-industry"></i><span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
			<ul class="treeview-menu ">
			<li class="<?php if($this->uri->segment(1)=="Sale"){echo "active";}?>" ><a  href="<?php echo base_url();?>Sale"><i class="fa fa-cart-plus"></i> <span>Sale</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Product"){echo "active";}?>" ><a  href="<?php echo base_url();?>Product"><i class="fa fa-shopping-cart"></i> <span>Product</span></a></li>	
				<li class="<?php if($this->uri->segment(1)=="Purchase"){echo "active";}?>" ><a  href="<?php echo base_url();?>Purchase"><i class="fa fa-file-powerpoint-o"></i> <span>Purchase</span></a>
				<li class="<?php if($this->uri->segment(1)=="Stockmovement"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stockmovement"><i class="fa fa-th"></i> <span>Master Stock</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Stockdetails"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stockdetails"><i class="fa fa-th"></i> <span>Branch Stock</span></a></li>
			</li>
				<?php } ?>

				<?php if($this->session->userdata['user_type']=='P'){ ?>
						<li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Stockmovement"){echo "active";}?>" ><a  href="<?php echo base_url();?>Panchayath_groups"><i class="fa fa-th"></i> <span>GROUPS</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Stockdetails"){echo "active";}?>" ><a  href="<?php echo base_url();?>Panchayath_deposit"><i class="fa fa-th"></i> <span>DEPOSIT</span></a></li>
				
				<li class="<?php if($this->uri->segment(1)=="Expense"){echo "active";}?>" ><a  href="<?php echo base_url();?>Panchayath_loan"><i class="fa fa-google-wallet"></i> <span>GROUP LOAN</span></a></li>
				


				<?php } ?>

				<?php if($this->session->userdata['user_type']=='R'){ ?>
				<li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Stockmovement"){echo "active";}?>" ><a  href="<?php echo base_url();?>Region_groups"><i class="fa fa-th"></i> <span>GROUPS</span></a></li>
				


				<?php } ?>
				<?php if(!($this->session->userdata['user_type']=='A') && !($this->session->userdata['user_type']=='P') && !($this->session->userdata['user_type']=='R')){?>
					<li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<!-- <li class="<?php if($this->uri->segment(1)=="Stockmovement"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stockmovement"><i class="fa fa-th"></i> <span>Master Stock</span></a></li> -->
				<li class="<?php if($this->uri->segment(1)=="Stockdetails"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stockdetails"><i class="fa fa-th"></i> <span>Branch Stock</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Sale"){echo "active";}?>" ><a  href="<?php echo base_url();?>Sale"><i class="fa fa-cart-plus"></i> <span>Sale</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Expense"){echo "active";}?>" ><a  href="<?php echo base_url();?>Expense"><i class="fa fa-google-wallet"></i> <span>Expense</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Department"){echo "active";}?>" ><a  href="<?php echo base_url();?>Department"><i class="fa fa-google-wallet"></i> <span>Department</span></a></li>
			<?php } ?>
			
			</ul>
        </li>
		
		


	</ul>	
    </section>
    <!-- /.sidebar -->
  </aside>