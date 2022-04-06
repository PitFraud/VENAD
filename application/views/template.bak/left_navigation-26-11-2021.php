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
				else if($this->uri->segment(1)=="Glogin")
                {echo "active";}

                  else if($this->uri->segment(1)=="Flogin")
                {echo "active";}

                //else if($this->uri->segment(1)=="Ulogin")
                //{echo "active";}

                 else if($this->uri->segment(1)=="Rlogin")
                {echo "active";}
			
		    ?>">
          <a><i class="fa fa-gear"></i><span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="Branch"){echo "active";}?>" ><a href="<?php echo base_url();?>Branch"><i class="fa fa-circle-o"></i><span>Branch Information</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="FinYear"){echo "active";}?>" ><a  href="<?php echo base_url();?>FinYear"><i class="fa fa-circle-o"></i> <span>Financial Year</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Changepass"){echo "active";}?>" ><a  href="<?php echo base_url();?>Changepass/add"><i class="fa fa-circle-o"></i> <span>Change Password</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Glogin"){echo "active";}?>" ><a  href="<?php echo base_url();?>Glogin"><i class="fa fa-circle-o"></i> <span>Group login</span></a></li>

			<li class="<?php if($this->uri->segment(1)=="Flogin"){echo "active";}?>" ><a  href="<?php echo base_url();?>Flogin"><i class="fa fa-circle-o"></i> <span>Fedaration Login</span></a></li>

       <!-- <li class="<?php //if($this->uri->segment(1)=="Ulogin"){echo "active";}?>" ><a  href="<?php //echo base_url();?>Ulogin"><i class="fa fa-circle-o"></i> <span>Unit Login</span></a></li>-->

			<li class="<?php if($this->uri->segment(1)=="Rlogin"){echo "active";}?>" ><a  href="<?php echo base_url();?>Rlogin"><i class="fa fa-circle-o"></i> <span>Region Login</span></a></li>
		</ul>
        </li>
		<li class="treeview <?php 

    if($this->uri->segment(1)=="Region")
                {echo "active";}

   // else if($this->uri->segment(1)=="Unit")
              //  {echo "active";}

    else if($this->uri->segment(1)=="Fedaration")
     {echo "active";}


      else if($this->uri->segment(1)=="Group")
                {echo "active";}
          
		
			else if($this->uri->segment(1)=="Member")
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
          <a><i class="fa fa-users"></i><span>Self Help Group</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> 
          </a>
		<ul class="treeview-menu ">
       <li class="<?php if($this->uri->segment(1)=="Region"){echo "active";}?>" ><a  href="<?php echo base_url();?>Region"><i class="fa fa-circle-o"></i> <span>Region</span></a></li>

       <!--<li class="<?php //if($this->uri->segment(1)=="Unit"){echo "active";}?>" ><a  href="<?php //echo base_url();?>Unit"><i class="fa fa-circle-o"></i> <span>Unit</span></a></li>-->

        <li class="<?php if($this->uri->segment(1)=="Fedaration"){echo "active";}?>" ><a  href="<?php echo base_url();?>Fedaration"><i class="fa fa-circle-o"></i> <span>Fedaration</span></a></li>

        <li class="<?php if($this->uri->segment(1)=="Group"){echo "active";}?>" ><a  href="<?php echo base_url();?>Group"><i class="fa fa-circle-o"></i> <span>SHG</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Member"){echo "active";}?>" ><a  href="<?php echo base_url();?>Member"><i class="fa fa-circle-o"></i> <span>Member</span></a></li>
			
		
			
     
			<li class="<?php if($this->uri->segment(1)=="President"){echo "active";}?>" ><a href="<?php echo base_url();?>President"><i class="fa fa-circle-o"></i><span>President</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Secratary"){echo "active";}?>" ><a  href="<?php echo base_url();?>Secratary"><i class="fa fa-circle-o"></i> <span>Secretary</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Treasurer"){echo "active";}?>" ><a  href="<?php echo base_url();?>Treasurer"><i class="fa fa-circle-o"></i> <span>Treasurer</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Animator"){echo "active";}?>" ><a  href="<?php echo base_url();?>Animator"><i class="fa fa-circle-o"></i> <span>Animator</span></a></li>
			
		</ul>
        </li>
		<li class="treeview <?php 

              if($this->uri->segment(1)=="Deposit")
                {echo "active";}
			/*else if($this->uri->segment(1)=="Deposit1")
                {echo "active";}
			else if($this->uri->segment(1)=="Deposit2")
                {echo "active";}
			 else if($this->uri->segment(1)=="Loan")
                {echo "active";}
			else if($this->uri->segment(1)=="AWCLoan")
                {echo "active";}
			else if($this->uri->segment(1)=="Linkingloan")
                {echo "active";}
			else if($this->uri->segment(1)=="Enterpriseloan")
                {echo "active";}*/


                 else if($this->uri->segment(1)=="Loan")
                {echo "active";}

            else if($this->uri->segment(1)=="Loanrepayment")
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
                  else if($this->uri->segment(1)=="Trial_balance")
                {echo "active";}
            else if($this->uri->segment(1)=="Balancesheet")
                {echo "active";}
                 else if($this->uri->segment(1)=="Income")
                {echo "active";}
		    ?>">
			
          <a><i class="fa fa-money"></i><span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  
		  
		  
		  
		  
		  
		  
			<ul class="treeview-menu ">
			
			
				<li class="treeview 
			<?php 
			if($this->uri->segment(1)=='Deposit')
                {echo "active";}
			else if($this->uri->segment(1)=='Deposit1')
                {echo "active";}
			else if($this->uri->segment(1)=='Deposit2')
                {echo "active";}
                ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Deposit
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!-- <li class="<?php if($this->uri->segment(1)=="Deposit"){echo "active";}?>" ><a  href="<?php echo base_url();?>Deposit"><i class="fa fa-circle-o"></i> <span>Deposit</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Deposit1"){echo "active";}?>" ><a  href="<?php echo base_url();?>Deposit1"><i class="fa fa-circle-o"></i> <span>Masavari</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Deposit2"){echo "active";}?>" ><a  href="<?php echo base_url();?>Deposit2"><i class="fa fa-circle-o"></i> <span>Other Income</span></a></li>--->
				<!--<li class="<?php //if($this->uri->segment(1)=="Deposit" && $this->uri->segment(2)=='viewgroup'){echo "active";}?>" ><a href="<?php echo base_url();?>Deposit/viewgroup"><i class="fa fa-circle-o"></i><span>Add Deposit</span></a></li>-->
             	<li class="<?php if($this->uri->segment(1)=="Deposit" && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>Deposit"><i class="fa fa-circle-o"></i><span>Member Deposits</span></a></li>

                  <li class="<?php if($this->uri->segment(1)=="Deposit" && $this->uri->segment(2)=='view_group_deposit'){echo "active";}?>" ><a href="<?php echo base_url();?>Deposit/view_group_deposit"><i class="fa fa-circle-o"></i><span>Group Deposits</span></a></li>
			</ul>
			</li>	
			
			
			
			
			
				
				<li class="treeview 
			<?php 
			if($this->uri->segment(1)=="UPNRMLoan")
                {echo "active";}
			else if($this->uri->segment(1)=="KSBCDCLoan")
                {echo "active";}
			else if($this->uri->segment(1)=="PDSLoan")
                {echo "active";}
			else if($this->uri->segment(1)=="PDSotherLoan")
                {echo "active";}
            else if($this->uri->segment(1)=="Loan")
                {echo "active";}

          /*  else if($this->uri->segment(1)=="Loanrepayment")
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
                  else if($this->uri->segment(1)=="Trial_balance")
                {echo "active";}
            else if($this->uri->segment(1)=="Balancesheet")
                {echo "active";}
                 else if($this->uri->segment(1)=="Income")
                {echo "active";}*/
                ?>">
                

              <a href="#"><i class="fa fa-circle-o"></i> Loan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              	<li class="<?php if($this->uri->segment(1)=="UPNRMLoan"){echo "active";}?>" ><a  href="<?php echo base_url();?>UPNRMLoan"><i class="fa fa-circle-o"></i> <span>Fedaration Loan</span></a></li>

				<li class="<?php if($this->uri->segment(1)=="KSBCDCLoan"){echo "active";}?>" ><a  href="<?php echo base_url();?>KSBCDCLoan"><i class="fa fa-circle-o"></i> <span>Bank Loan</span></a></li>

				<li class="<?php if($this->uri->segment(1)=="HDSLoan"){echo "active";}?>" ><a  href="<?php echo base_url();?>HDSLoan"><i class="fa fa-circle-o"></i> <span>PDS Loan</span></a></li>

				<li class="<?php if($this->uri->segment(1)=="HDSotherLoan"){echo "active";}?>" ><a  href="<?php echo base_url();?>HDSotherLoan"><i class="fa fa-circle-o"></i> <span>PDS Other Loan</span></a></li>

                 <li class="<?php if($this->uri->segment(1)=="Loan"){echo "active";}?>" ><a  href="<?php echo base_url();?>Loan"><i class="fa fa-circle-o"></i> <span>Group Loan</span></a></li>
				
				 </ul>
			</li>

			<!--	<li class="<?php if($this->uri->segment(1)=="Loanrepayment"){echo "active";}?>" ><a  href="<?php echo base_url();?>Loanrepayment"><i class="fa fa-circle-o"></i> <span>Loan Repayment</span></a></li>-->
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

			
			
			<li class="<?php if($this->uri->segment(1)=='Voucher' && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>Voucher"><i class="fa fa-circle-o"></i>Voucher Entry</a></li>
			<li class="<?php if($this->uri->segment(1)=='Receipt' && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>Receipt"><i class="fa fa-circle-o"></i>Receipt Entry</a></li>



			<li class="<?php if($this->uri->segment(1)=="Daybook"){echo "active";}?>" ><a  href="<?php echo base_url();?>Daybook"><i class="fa fa-circle-o"></i> <span>Daybook</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="fa fa-circle-o"></i> <span>Ledger</span></a></li>

			<li class="<?php if($this->uri->segment(1)=="Balancesheet"){echo "active";}?>" ><a  href="<?php echo base_url();?>Balancesheet"><i class="fa fa-circle-o"></i> <span>Balance Sheet</span></a></li>


			<li class="<?php if($this->uri->segment(1)=="Trial_balance"){echo "active";}?>" ><a  href="<?php echo base_url();?>Trial_balance"><i class="fa fa-circle-o"></i> <span>Trial Balance</span></a></li>
				

			<li class="<?php if($this->uri->segment(1)=="Income"){echo "active";}?>" ><a  href="<?php echo base_url();?>Income"><i class="fa fa-circle-o"></i> <span>Income And Expenditure A/c</span></a></li>
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
			<li class="<?php if($this->uri->segment(1)=="Customer"){echo "active";}?>" ><a href="<?php echo base_url();?>Customer"><i class="fa fa-circle-o"></i> <span>Customer Master</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Vendor"){echo "active";}?>" ><a href="<?php echo base_url();?>Vendor"><i class="fa fa-circle-o"></i> <span>Vendor Master</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Taxdetails"){echo "active";}?>" ><a href="<?php echo base_url();?>Taxdetails"><i class="fa fa-circle-o"></i> <span>Tax Master</span></a></li>
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
			<li class="<?php if($this->uri->segment(1)=="Employee"){echo "active";}?>" ><a  href="<?php echo base_url();?>Employee"><i class="fa fa-circle-o"></i> <span>Employee Master</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Emp_attendence"){echo "active";}?>" ><a href="<?php echo base_url();?>Emp_attendence"><i class="fa fa-circle-o"></i> <span>Employee Attendance</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Advancepayments"){echo "active";}?>" ><a href="<?php echo base_url();?>Advancepayments"><i class="fa fa-circle-o"></i> <span>Advance Payments</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Overtime"){echo "active";}?>" ><a href="<?php echo base_url();?>Overtime"><i class="fa fa-circle-o"></i> <span>Overtime Details</span></a></li>
			 <li class="<?php if($this->uri->segment(1)=="Payroll"){echo "active";}?>" ><a href="<?php echo base_url();?>Payroll"><i class="fa fa-circle-o"></i> <span>Payroll</span></a></li>
		</ul>
        </li>
		<li class="treeview <?php 
			if($this->uri->segment(1)=="Projectmaster")
                {echo "active";}
            else if($this->uri->segment(1)=="Prole")
                {echo "active";}
			else if($this->uri->segment(1)=="Pmilestone")
                {echo "active";}
			else if($this->uri->segment(1)=="Pphases")
                {echo "active";}
			else if($this->uri->segment(1)=="Pactivity")
                {echo "active";}
			else if($this->uri->segment(1)=="Ptask")
                {echo "active";}
			else if($this->uri->segment(1)=="Peffort")
                {echo "active";}
			else if($this->uri->segment(1)=="Presource")
                {echo "active";}
			else if($this->uri->segment(1)=="Pdependancy")
                {echo "active";}
			?>">
          <a><i class="fa fa-industry"></i><span>Project</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
		    <li class="<?php if($this->uri->segment(1)=="Projectmaster"){echo "active";}?>" ><a  href="<?php echo base_url();?>Projectmaster"><i class="fa fa-circle-o"></i> <span>Project Master</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Prole"){echo "active";}?>" ><a  href="<?php echo base_url();?>Prole"><i class="fa fa-circle-o"></i> <span>Project Roles</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Pmilestone"){echo "active";}?>" ><a href="<?php echo base_url();?>Pmilestone"><i class="fa fa-circle-o"></i> <span>Project Milestone</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Pphases"){echo "active";}?>" ><a href="<?php echo base_url();?>Pphases"><i class="fa fa-circle-o"></i> <span>Project Phases</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Pactivity"){echo "active";}?>" ><a href="<?php echo base_url();?>Pactivity"><i class="fa fa-circle-o"></i> <span>Project Activity</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Ptask"){echo "active";}?>" ><a href="<?php echo base_url();?>Ptask"><i class="fa fa-circle-o"></i> <span>Project Task</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Peffort"){echo "active";}?>" ><a href="<?php echo base_url();?>Peffort"><i class="fa fa-circle-o"></i> <span>Project Efforts</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Presource"){echo "active";}?>" ><a href="<?php echo base_url();?>Presource"><i class="fa fa-circle-o"></i> <span>Project Resources</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Pdependancy"){echo "active";}?>" ><a href="<?php echo base_url();?>Pdependancy"><i class="fa fa-circle-o"></i> <span>Project Dependancy</span></a></li>

		</ul>
        </li>

        <li class="treeview <?php 
		//  echo $this->uri->segment(1);
		//  exit(0);

		 if($this->uri->segment(1)=="Cagmeating")
                 {echo "active";}
		else if($this->uri->segment(1)=="Unitlevelactivity")
                {echo "active";}
		else if($this->uri->segment(1)=="Centrallevelactivity")
                {echo "active";}



			?>">
			<a><i class="glyphicon glyphicon-list-alt"></i><span>Evaluation Forms</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
            </a>
            <ul class="treeview-menu ">
				<li class="<?php if($this->uri->segment(1)=="Cagmeating"){echo "active";}?>" ><a  href="<?php echo base_url();?>Cagmeating"><i class="fa fa-file-text-o"></i> <span>SHG Meeting Form</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Unitlevelactivity"){echo "active";}?>" ><a  href="<?php echo base_url();?>Unitlevelactivity"><i class="fa fa-file-text-o"></i> <span>Unit Level Activity Form</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Centrallevelactivity"){echo "active";}?>" ><a  href="<?php echo base_url();?>Centrallevelactivity"><i class="fa fa-file-text-o"></i> <span>Central Level Activity Form</span></a></li>

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


				<li class="<?php if($this->uri->segment(1)=="Groupreport"){echo "active";}?>" >
				<a href="#"><i class="fa fa-file-text-o"></i><span>Group Report</span>
            	<span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            	</span>
          		</a>
					<ul class="treeview-menu ">
						<li class="<?php if($this->uri->segment(1)=='Groupreport' && $this->uri->segment(2)==''){echo "active";}?>" ><a  href="<?php echo base_url();?>Groupreport"><i class="fa fa-file-text-o"></i> <span>All Report</span></a></li>
						<li class="<?php if($this->uri->segment(1)=='Groupreport' && $this->uri->segment(2)=='groupdepositreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Groupreport/groupdepositreport"><i class="fa fa-file-text-o"></i> <span>Deposit Report</span></a></li>

						<li class="<?php if($this->uri->segment(1)=='Groupreport' && $this->uri->segment(2)=='groupwithdrawalreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Groupreport/groupwithdrawalreport"><i class="fa fa-file-text-o"></i> <span>Withdrawal Report</span></a></li>

						<li class="<?php if($this->uri->segment(1)=='Groupreport' && $this->uri->segment(2)=='grouploanreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Groupreport/grouploanreport"><i class="fa fa-file-text-o"></i> <span>Loan Report</span></a></li>

						<!--<li class="<?php //if($this->uri->segment(1)=='Groupreport' && $this->uri->segment(2)=='grouprepaymentreport'){echo "active";}?>" ><a  href="<?php //echo base_url();?>Groupreport/grouprepaymentreport"><i class="fa fa-file-text-o"></i> <span>Loan Repayment Report</span></a></li>-->

						<li class="<?php if($this->uri->segment(1)=='Groupreport' && $this->uri->segment(2)=='attendancereport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Groupreport/attendancereport"><i class="fa fa-file-text-o"></i> <span>Attendance Report</span></a></li>

					</ul>
				</li>
				
				
			</ul>
        </li>
		
		
		
		<li class="treeview <?php 
			 if($this->uri->segment(1)=="Dreport")
                {echo "active";}
			else if($this->uri->segment(1)=="Wreport")
                {echo "active";}
				else if($this->uri->segment(1)=="Mreport")
                {echo "active";}
			else if($this->uri->segment(1)=="Areport")
                {echo "active";}
			
		    ?>">
          <a><i class="fa fa-gear"></i><span>Support</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="Dreport"){echo "active";}?>" ><a href="<?php echo base_url();?>Dreport"><i class="fa fa-circle-o"></i><span>Daily Report</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Wreport"){echo "active";}?>" ><a href="<?php echo base_url();?>Wreport"><i class="fa fa-circle-o"></i><span>Weekly Report</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Mreport"){echo "active";}?>" ><a href="<?php echo base_url();?>Mreport"><i class="fa fa-circle-o"></i><span>Monthly Report</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Areport"){echo "active";}?>" ><a href="<?php echo base_url();?>Areport"><i class="fa fa-circle-o"></i><span>Anuval Report</span></a></li>
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

				<li class="<?php if($this->uri->segment(1)=="Fedaration_shg"){echo "active";}?>" ><a  href="<?php echo base_url();?>Fedaration_shg"><i class="fa fa-users"></i> <span>Self Help Groups</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="FAnimator"){echo "active";}?>" ><a  href="<?php echo base_url();?>FAnimator"><i class="fa fa-users"></i> <span>Animator</span></a></li>

            <li class="<?php if($this->uri->segment(1)=="FPresident"){echo "active";}?>" ><a  href="<?php echo base_url();?>FPresident"><i class="fa fa-users"></i> <span>President</span></a></li>


              <li class="<?php if($this->uri->segment(1)=="FSecratary"){echo "active";}?>" ><a  href="<?php echo base_url();?>FSecratary"><i class="fa fa-users"></i> <span>Secratary</span></a></li>

				<li class="<?php if($this->uri->segment(1)=="Fedaration_deposit"){echo "active";}?>" ><a  href="<?php echo base_url();?>Fedaration_deposit"><i class="fa fa-money"></i> <span>Deposits</span></a></li>


					<li class="treeview <?php 
			 if($this->uri->segment(1)=="FLoan")
                {echo "active";}
			
		    ?>">
          <a href="#"><i class="fa fa-bank"></i><span>Group Loan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="FLoan" && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>FLoan"><i class="fa fa-circle-o"></i><span>Loan Repayment</span></a></li>
           

			
		</ul>
        </li>

        <li class="treeview <?php 
			if($this->uri->segment(1)=="Attendance")
                {echo "active";}
              
		    ?>">
          <a href="#"><i class="fa fa-calendar"></i><span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
			<li class="<?php if($this->uri->segment(1)=="Fedaration_shg" && $this->uri->segment(2)=='Attendance'){echo "active";}?>" ><a  href="<?php echo base_url();?>Fedaration_shg/Attendance"><i class="fa fa-circle-o"></i> <span>Attendance Report</span></a></li>
			
		</ul>
        </li>


        <li class="<?php if($this->uri->segment(1)=="Preport"){echo "active";}?>" >
				<a href="#"><i class="fa fa-file-text-o"></i><span>Group Report</span>
            	<span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            	</span>
          		</a>
					<ul class="treeview-menu ">
						<li class="<?php if($this->uri->segment(1)=='Preport' && $this->uri->segment(2)==''){echo "active";}?>" ><a  href="<?php echo base_url();?>Preport"><i class="fa fa-file-text-o"></i> <span>All Report</span></a></li>
						<li class="<?php if($this->uri->segment(1)=='Preport' && $this->uri->segment(2)=='groupdepositreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Preport/groupdepositreport"><i class="fa fa-file-text-o"></i> <span>Deposit Report</span></a></li>

						<li class="<?php if($this->uri->segment(1)=='Preport' && $this->uri->segment(2)=='groupwithdrawalreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Preport/groupwithdrawalreport"><i class="fa fa-file-text-o"></i> <span>Withdrawal Report</span></a></li>

						<li class="<?php if($this->uri->segment(1)=='Preport' && $this->uri->segment(2)=='grouploanreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Preport/grouploanreport"><i class="fa fa-file-text-o"></i> <span>Loan Report</span></a></li>

						

					</ul>
				</li>
				


				<?php } ?>

				<?php if($this->session->userdata['user_type']=='U'){ ?>
				<li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

				<li class="<?php if($this->uri->segment(1)=="RFedaration" && $this->uri->segment(2)==''){echo "active";}?>" ><a  href="<?php echo base_url();?>RFedaration"><i class="fa fa-globe"></i> <span>Fedaration</span></a></li>

				<li class="<?php if($this->uri->segment(1)=="Unit_deposit"){echo "active";}?>" ><a  href="<?php echo base_url();?>Unit_deposit"><i class="fa fa-money"></i> <span>Deposit</span></a></li>
				
				<li class="<?php if($this->uri->segment(1)=="ULoan"){echo "active";}?>" ><a  href="<?php echo base_url();?>ULoan"><i class="fa fa-bank"></i> <span>Group Loan</span></a></li>

				<li class="<?php if($this->uri->segment(1)=="RFedaration" && $this->uri->segment(2)=='Attendance'){echo "active";}?>" ><a  href="<?php echo base_url();?>RFedaration/Attendance"><i class="fa fa-calendar"></i> <span>Attendance Report</span></a></li>



				  <li class="<?php if($this->uri->segment(1)=="Ureport"){echo "active";}?>" >
				<a href="#"><i class="fa fa-file-text-o"></i><span>Group Report</span>
            	<span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            	</span>
          		</a>
					<ul class="treeview-menu ">
						<li class="<?php if($this->uri->segment(1)=='Ureport' && $this->uri->segment(2)==''){echo "active";}?>" ><a  href="<?php echo base_url();?>Ureport"><i class="fa fa-file-text-o"></i> <span>All Report</span></a></li>
						<li class="<?php if($this->uri->segment(1)=='Ureport' && $this->uri->segment(2)=='groupdepositreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Ureport/groupdepositreport"><i class="fa fa-file-text-o"></i> <span>Deposit Report</span></a></li>

						<li class="<?php if($this->uri->segment(1)=='Ureport' && $this->uri->segment(2)=='groupwithdrawalreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Ureport/groupwithdrawalreport"><i class="fa fa-file-text-o"></i> <span>Withdrawal Report</span></a></li>

						<li class="<?php if($this->uri->segment(1)=='Ureport' && $this->uri->segment(2)=='grouploanreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Ureport/grouploanreport"><i class="fa fa-file-text-o"></i> <span>Loan Report</span></a></li>

						

					</ul>
				</li>

				


				<?php } ?>
				<?php if($this->session->userdata['user_type']=='G'){ ?>

				<li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

				<li class="<?php if($this->uri->segment(1)=="gmember"){echo "active";}?>" ><a  href="<?php echo base_url();?>GMember"><i class="fa fa-users"></i> <span>Members</span></a></li>

			<li class="treeview <?php 
			 if($this->uri->segment(1)=="GDeposit")
                {echo "active";}
			
		    ?>">
		          <a href="#"><i class="fa fa-money"></i><span>Deposits</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
				<ul class="treeview-menu ">
		            <li class="<?php if($this->uri->segment(1)=="GDeposit" && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>GDeposit"><i class="fa fa-circle-o"></i><span>Add Member Deposit</span></a></li>
		             <li class="<?php if($this->uri->segment(1)=="GDeposit" && $this->uri->segment(2)=='viewlist'){echo "active";}?>" ><a href="<?php echo base_url();?>GDeposit/viewlist"><i class="fa fa-circle-o"></i><span>View Member Deposits</span></a></li>

                <li class="<?php if($this->uri->segment(1)=="GDeposit" && $this->uri->segment(2)=='group_deposit'){echo "active";}?>" ><a href="<?php echo base_url();?>GDeposit/group_deposit"><i class="fa fa-circle-o"></i><span>Add Group Deposit</span></a></li>
                 <li class="<?php if($this->uri->segment(1)=="GDeposit" && $this->uri->segment(2)=='view_group_deposit'){echo "active";}?>" ><a href="<?php echo base_url();?>GDeposit/view_group_deposit"><i class="fa fa-circle-o"></i><span>View Group Deposits</span></a></li>
					
			
				</ul>
        	</li>

					<li class="treeview <?php 
			 if($this->uri->segment(1)=="GLoan")
                {echo "active";}
			
		    ?>">
          <a><i class="fa fa-bank"></i><span>Loan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan"><i class="fa fa-circle-o"></i><span>Loan Repayment</span></a></li>
           

             	<li class="treeview 
			<?php 
			if($this->uri->segment(2)=="UPNRMLoan")
                {echo "active";}
                else if($this->uri->segment(2)=="GroupLoan")
                {echo "active";}
			else if($this->uri->segment(2)=="KSBCDCLoan")
                {echo "active";}
			else if($this->uri->segment(2)=="HDSLoan")
                {echo "active";}
			else if($this->uri->segment(2)=="HDSotherLoan")
                {echo "active";}
			
                ?>">
                

              <a href="#"><i class="fa fa-circle-o"></i> Issue Loan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
			   <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)=='UPNRMLoan'){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan/UPNRMLoan"><i class="fa fa-circle-o"></i><span>Fedaration Loan</span></a></li>

			    <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)=='GroupLoan'){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan/GroupLoan"><i class="fa fa-circle-o"></i><span>Group Loan</span></a></li>

			    <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)=='KSBCDCLoan'){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan/KSBCDCLoan"><i class="fa fa-circle-o"></i><span>Bank Loan</span></a></li>

                <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)=='HDSLoan'){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan/HDSLoan"><i class="fa fa-circle-o"></i><span>PDSLoan</span></a></li>

                <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)=='HDSotherLoan'){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan/HDSotherLoan"><i class="fa fa-circle-o"></i><span>PDSotherLoan</span></a></li>

               


				 </ul>
			</li>


        <li class="treeview 
      <?php 
      if($this->uri->segment(2)=="Gfedarationloan")
                {echo "active";}
                else if($this->uri->segment(2)=="Gpdsloan")
                {echo "active";}
      else if($this->uri->segment(2)=="Gbankloan")
                {echo "active";}
     
      
                ?>">
                

              <a href="#"><i class="fa fa-circle-o"></i> Group Loan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
         <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)=='Gfedarationloan'){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan/Gfedarationloan"><i class="fa fa-circle-o"></i><span>Fedaration Loan</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)=='Gpdsloan'){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan/Gpdsloan"><i class="fa fa-circle-o"></i><span>PDS Loan</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="GLoan" && $this->uri->segment(2)=='Gbankloan'){echo "active";}?>" ><a href="<?php echo base_url();?>GLoan/Gbankloan"><i class="fa fa-circle-o"></i><span>Bank Loan</span></a></li>

             

         </ul>
      </li>


			
		</ul>
        </li>


            <li class="treeview <?php 
      if($this->uri->segment(1)=="GVoucherhead")
                {echo "active";}

     else if($this->uri->segment(1)=="GReceipthead")
                {echo "active";}

    else if($this->uri->segment(1)=="GVoucher")
                {echo "active";}

     else if($this->uri->segment(1)=="GVoucher")
                {echo "active";}

     else if($this->uri->segment(1)=="GReceipt")
                {echo "active";}

      else if($this->uri->segment(1)=="GDaybook")
                {echo "active";}

       else if($this->uri->segment(1)=="GroupLedger")
                {echo "active";}

      else if($this->uri->segment(1)=="GBalancesheet")
                {echo "active";}

      else if($this->uri->segment(1)=="GTrial_balance")
                {echo "active";}

       else if($this->uri->segment(1)=="GIncome")
                {echo "active";}
              
        ?>">
          <a href="#"><i class="fa fa-money"></i><span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    <ul class="treeview-menu ">
      <li class="treeview 
      <?php 
      if($this->uri->segment(1)=='GVoucherhead')
                {echo "active";}
      else if($this->uri->segment(1)=='GReceipthead')
                {echo "active";}
                ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Create account heads
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <li class="<?php if($this->uri->segment(1)=='GVoucherhead'){echo "active";}?>" ><a href="<?php echo base_url();?>GVoucherhead"><i class="fa fa-circle-o"></i>Voucher</a></li>
        <li class="<?php if($this->uri->segment(1)=='GReceipthead'){echo "active";}?>" ><a href="<?php echo base_url();?>GReceipthead"><i class="fa fa-circle-o"></i>Receipt</a></li>
        </ul>
      </li>

      <li class="<?php if($this->uri->segment(1)=='GVoucher' && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>GVoucher"><i class="fa fa-circle-o"></i>Voucher Entry</a></li>
      <li class="<?php if($this->uri->segment(1)=='GReceipt' && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>GReceipt"><i class="fa fa-circle-o"></i>Receipt Entry</a></li>



      <li class="<?php if($this->uri->segment(1)=="GDaybook"){echo "active";}?>" ><a  href="<?php echo base_url();?>GDaybook"><i class="fa fa-circle-o"></i> <span>Daybook</span></a></li>
      <li class="<?php if($this->uri->segment(1)=="GLedger"){echo "active";}?>" ><a  href="<?php echo base_url();?>GLedger"><i class="fa fa-circle-o"></i> <span>Ledger</span></a></li>

      <li class="<?php if($this->uri->segment(1)=="GBalancesheet"){echo "active";}?>" ><a  href="<?php echo base_url();?>GBalancesheet"><i class="fa fa-circle-o"></i> <span>Balance Sheet</span></a></li>


      <li class="<?php if($this->uri->segment(1)=="GTrial_balance"){echo "active";}?>" ><a  href="<?php echo base_url();?>GTrial_balance"><i class="fa fa-circle-o"></i> <span>Trial Balance</span></a></li>
        

      <li class="<?php if($this->uri->segment(1)=="GIncome"){echo "active";}?>" ><a  href="<?php echo base_url();?>GIncome"><i class="fa fa-circle-o"></i> <span>Income And Expenditure A/c</span></a></li>
      
    </ul>
        </li>


         <li class="treeview <?php 
			if($this->uri->segment(1)=="Attendance")
                {echo "active";}
              
		    ?>">
          <a href="#"><i class="fa fa-calendar"></i><span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		<ul class="treeview-menu ">
			<li class="<?php if($this->uri->segment(1)=="Attendance"){echo "active";}?>" ><a  href="<?php echo base_url();?>Attendance"><i class="fa fa-circle-o"></i> <span>Attendance Report</span></a></li>
			
		</ul>
        </li>

        <li class="<?php if($this->uri->segment(1)=="Greport"){echo "active";}?>" >
				<a href="#"><i class="fa fa-file-text-o"></i><span>Group Report</span>
            	<span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            	</span>
          		</a>
					<ul class="treeview-menu ">
						<li class="<?php if($this->uri->segment(1)=='Greport' && $this->uri->segment(2)==''){echo "active";}?>" ><a  href="<?php echo base_url();?>Greport"><i class="fa fa-file-text-o"></i> <span>All Report</span></a></li>
						<li class="<?php if($this->uri->segment(1)=='Greport' && $this->uri->segment(2)=='groupdepositreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Greport/groupdepositreport"><i class="fa fa-file-text-o"></i> <span>Deposit Report</span></a></li>

						<li class="<?php if($this->uri->segment(1)=='Greport' && $this->uri->segment(2)=='groupwithdrawalreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Greport/groupwithdrawalreport"><i class="fa fa-file-text-o"></i> <span>Withdrawal Report</span></a></li>

						<li class="<?php if($this->uri->segment(1)=='Greport' && $this->uri->segment(2)=='grouploanreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Greport/grouploanreport"><i class="fa fa-file-text-o"></i> <span>Loan Report</span></a></li>

						

					</ul>
				</li>
				


				<?php } ?>


        <?php if($this->session->userdata['user_type']=='R'){ ?>
        <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="RPanchayath"){echo "active";}?>" ><a  href="<?php echo base_url();?>RPanchayath"><i class="fa fa-globe"></i> <span>Fedarations</span></a></li>

        <li class="<?php if($this->uri->segment(1)=="Region_deposit"){echo "active";}?>" ><a  href="<?php echo base_url();?>Region_deposit"><i class="fa fa-money"></i> <span>Deposit</span></a></li>
        
        <li class="<?php if($this->uri->segment(1)=="RLoan"){echo "active";}?>" ><a  href="<?php echo base_url();?>RLoan"><i class="fa fa-bank"></i> <span>Group Loan</span></a></li>

        <li class="<?php if($this->uri->segment(1)=="RPanchayath" && $this->uri->segment(2)=='Attendance'){echo "active";}?>" ><a  href="<?php echo base_url();?>RPanchayath/Attendance"><i class="fa fa-calendar"></i> <span>Attendance Report</span></a></li>


          <li class="<?php if($this->uri->segment(1)=="Rreport"){echo "active";}?>" >
        <a href="#"><i class="fa fa-file-text-o"></i><span>Group Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
          <ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=='Rreport' && $this->uri->segment(2)==''){echo "active";}?>" ><a  href="<?php echo base_url();?>Rreport"><i class="fa fa-file-text-o"></i> <span>All Report</span></a></li>
            <li class="<?php if($this->uri->segment(1)=='Rreport' && $this->uri->segment(2)=='groupdepositreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Rreport/groupdepositreport"><i class="fa fa-file-text-o"></i> <span>Deposit Report</span></a></li>

            <li class="<?php if($this->uri->segment(1)=='Rreport' && $this->uri->segment(2)=='groupwithdrawalreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Rreport/groupwithdrawalreport"><i class="fa fa-file-text-o"></i> <span>Withdrawal Report</span></a></li>

            <li class="<?php if($this->uri->segment(1)=='Rreport' && $this->uri->segment(2)=='grouploanreport'){echo "active";}?>" ><a  href="<?php echo base_url();?>Rreport/grouploanreport"><i class="fa fa-file-text-o"></i> <span>Loan Report</span></a></li>

            

          </ul>
        </li>
        


        <?php } ?>
				
				<?php if($this->session->userdata['user_type']=='hr'){ ?>
					<li class="<?php if($this->uri->segment(1)=="Employee"){echo "active";}?>" ><a  href="<?php echo base_url();?>Employee"><i class="fa fa-circle-o"></i> <span>Employee Master</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Emp_attendence"){echo "active";}?>" ><a href="<?php echo base_url();?>Emp_attendence"><i class="fa fa-circle-o"></i> <span>Employee Attendance</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Advancepayments"){echo "active";}?>" ><a href="<?php echo base_url();?>Advancepayments"><i class="fa fa-circle-o"></i> <span>Advance Payments</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Overtime"){echo "active";}?>" ><a href="<?php echo base_url();?>Overtime"><i class="fa fa-circle-o"></i> <span>Overtime Details</span></a></li>
			 <li class="<?php if($this->uri->segment(1)=="Payroll"){echo "active";}?>" ><a href="<?php echo base_url();?>Payroll"><i class="fa fa-circle-o"></i> <span>Payroll</span></a></li>
		
					<?php } ?>
					
					
						<?php if($this->session->userdata['user_type']=='pr'){ ?>
						
						<li class="<?php if($this->uri->segment(1)=="Projectmaster"){echo "active";}?>" ><a  href="<?php echo base_url();?>Projectmaster"><i class="fa fa-circle-o"></i> <span>Project Master</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="ProjectRoles"){echo "active";}?>" ><a  href="<?php echo base_url();?>ProjectRoles"><i class="fa fa-circle-o"></i> <span>Project Roles</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Projectmilestone"){echo "active";}?>" ><a href="<?php echo base_url();?>Projectmilestone"><i class="fa fa-circle-o"></i> <span>Project Milestone</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Projectphases"){echo "active";}?>" ><a href="<?php echo base_url();?>Projectphases"><i class="fa fa-circle-o"></i> <span>Project Phases</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Projectactivity"){echo "active";}?>" ><a href="<?php echo base_url();?>Projectactivity"><i class="fa fa-circle-o"></i> <span>Project Activity</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Projecttask"){echo "active";}?>" ><a href="<?php echo base_url();?>Projecttask"><i class="fa fa-circle-o"></i> <span>Project Task</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Projectefforts"){echo "active";}?>" ><a href="<?php echo base_url();?>Projectefforts"><i class="fa fa-circle-o"></i> <span>Project Efforts</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Projectresources"){echo "active";}?>" ><a href="<?php echo base_url();?>Projectresources"><i class="fa fa-circle-o"></i> <span>Project Resources</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Projectdependancy"){echo "active";}?>" ><a href="<?php echo base_url();?>Projectdependancy"><i class="fa fa-circle-o"></i> <span>Project Dependancy</span></a></li>

				
					<?php } ?>
					
					
						<?php if($this->session->userdata['user_type']=='ac'){ ?>
					<li class="<?php if($this->uri->segment(1)=="Deposit"){echo "active";}?>" ><a  href="<?php echo base_url();?>Deposit"><i class="fa fa-circle-o"></i> <span>Deposit</span></a></li>
			 <li class="<?php if($this->uri->segment(1)=="Loan"){echo "active";}?>" ><a  href="<?php echo base_url();?>Loan"><i class="fa fa-circle-o"></i> <span>Group Loan</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="AWCLoan"){echo "active";}?>" ><a  href="<?php echo base_url();?>AWCLoan"><i class="fa fa-circle-o"></i> <span>Samridhy Loan</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Linkingloan"){echo "active";}?>" ><a  href="<?php echo base_url();?>Linkingloan"><i class="fa fa-circle-o"></i> <span>Linking Loan</span></a></li>
				<li class="<?php if($this->uri->segment(1)=="Enterpriseloan"){echo "active";}?>" ><a  href="<?php echo base_url();?>Enterpriseloan"><i class="fa fa-circle-o"></i> <span>Enterprise Loan</span></a></li>
			 <li class="<?php if($this->uri->segment(1)=='Voucherhead'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucherhead"><i class="fa fa-circle-o"></i>Voucher Head</a></li>
				<li class="<?php if($this->uri->segment(1)=='Receipthead'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipthead"><i class="fa fa-circle-o"></i>Receipt Head</a></li>
			  	<li class="<?php if($this->uri->segment(1)=='Voucher' && $this->uri->segment(2)=='create'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucher"><i class="fa fa-circle-o"></i>Voucher Entry</a></li>
			<li class="<?php if($this->uri->segment(1)=='Receipt' && $this->uri->segment(2)=='create'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipt"><i class="fa fa-circle-o"></i>Receipt Entry</a></li>  
			<li class="<?php if($this->uri->segment(1)=="Daybook"){echo "active";}?>" ><a  href="<?php echo base_url();?>Daybook"><i class="fa fa-circle-o"></i> <span>Daybook</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="fa fa-circle-o"></i> <span>Ledger</span></a></li>

			<li class="<?php if($this->uri->segment(1)=="Balancesheet"){echo "active";}?>" ><a  href="<?php echo base_url();?>Balancesheet"><i class="fa fa-circle-o"></i> <span>Balance Sheet</span></a></li>
				

			<li class="<?php if($this->uri->segment(1)=="Balancesheet"){echo "active";}?>" ><a  href="<?php echo base_url();?>Income"><i class="fa fa-circle-o"></i> <span>Income And Expenditure A/c</span></a></li>
		
				
					<?php } ?>
					
					
						<?php if($this->session->userdata['user_type']=='shg'){ ?>
					<li class="<?php if($this->uri->segment(1)=="Member"){echo "active";}?>" ><a  href="<?php echo base_url();?>Member"><i class="fa fa-circle-o"></i> <span>Member</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Group"){echo "active";}?>" ><a  href="<?php echo base_url();?>Group"><i class="fa fa-circle-o"></i> <span>Group</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Fedaration"){echo "active";}?>" ><a  href="<?php echo base_url();?>Fedaration"><i class="fa fa-circle-o"></i> <span>Fedaration</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Unit"){echo "active";}?>" ><a  href="<?php echo base_url();?>Unit"><i class="fa fa-circle-o"></i> <span>Unit</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="President"){echo "active";}?>" ><a href="<?php echo base_url();?>President"><i class="fa fa-circle-o"></i><span>President</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Secratary"){echo "active";}?>" ><a  href="<?php echo base_url();?>Secratary"><i class="fa fa-circle-o"></i> <span>Secretary</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Treasurer"){echo "active";}?>" ><a  href="<?php echo base_url();?>Treasurer"><i class="fa fa-circle-o"></i> <span>Treasurer</span></a></li>
			<li class="<?php if($this->uri->segment(1)=="Animator"){echo "active";}?>" ><a  href="<?php echo base_url();?>Animator"><i class="fa fa-circle-o"></i> <span>Animator</span></a></li>
			
					<?php } ?>
					
				<?php if(!($this->session->userdata['user_type']=='A') && !($this->session->userdata['user_type']=='P') && !($this->session->userdata['user_type']=='pr')&& !($this->session->userdata['user_type']=='ac')&& !($this->session->userdata['user_type']=='shg') &&!($this->session->userdata['user_type']=='G') && !($this->session->userdata['user_type']=='R')&&!($this->session->userdata['user_type']=='hr') && !($this->session->userdata['user_type']=='U')){?>
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