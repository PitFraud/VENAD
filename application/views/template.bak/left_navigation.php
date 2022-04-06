<aside class="main-sidebar">
  <section class="sidebar" style="margin-top:50px">
    <ul class="sidebar-menu" id="navi">
      <?php if($this->session->userdata['user_type']=='0'){ ?>
        <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview <?php
        if($this->uri->segment(1)=="Shopinfo")
        {echo "active";}
        else if($this->uri->segment(1)=="FinYear")
        {echo "active";}
        else if($this->uri->segment(1)=="Panchayath")
        {echo "active";}
        else if($this->uri->segment(1)=="District")
        {echo "active";}
        else if($this->uri->segment(1)=="State")
        {echo "active";}
        else if($this->uri->segment(1)=="Mlogin")
        {echo "active";}
        else if($this->uri->segment(1)=="Plogin")
        {echo "active";}
        else if($this->uri->segment(1)=="Dlogin")
        {echo "active";}
        else if($this->uri->segment(1)=="Slogin")
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

          <li class="<?php if($this->uri->segment(1)=="Changepass"){echo "active";}?>" ><a  href="<?php echo base_url(); ?>ChangePassword">
            <i class="fa fa-circle-o"></i> <span>Change Password</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Panchayath"){echo "active";}?>" ><a href="<?php echo base_url();?>Panchayath"><i class="fa fa-circle-o"></i><span>Panchayath</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="District"){echo "active";}?>" ><a  href="<?php echo base_url();?>District"><i class="fa fa-circle-o"></i> <span>District</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="State"){echo "active";}?>" ><a  href="<?php echo base_url();?>State"><i class="fa fa-circle-o"></i> <span>State</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Mlogin"){echo "active";}?>" ><a  href="<?php echo base_url(); ?>Mlogin">
            <i class="fa fa-circle-o"></i> <span>Member login</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Plogin"){echo "active";}?>" ><a  href="#">
            <i class="fa fa-circle-o"></i> <span>Panchayath Login</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Dlogin"){echo "active";}?>" ><a  href="<?php echo base_url(); ?>District_login">
            <i class="fa fa-circle-o"></i> <span>District Login</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Slogin"){echo "active";}?>" ><a  href="<?php echo base_url(); ?>StateLogin">
            <i class="fa fa-circle-o"></i> <span>State Login</span></a></li>
        </ul>
      </li>
      <li class="treeview <?php
      if($this->uri->segment(1)=="Member")
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
        <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)=='add'){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/add"><i class="fa fa-circle-o"></i> <span>Add Members</span></a></li>

        <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)==''){echo "active";}?>" ><a  href="<?php echo base_url();?>Member"><i class="fa fa-circle-o"></i> <span>Manage Members</span></a></li>

        <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)=='shareholders'){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/shareholders"><i class="fa fa-circle-o"></i> <span>Shareholders</span></a></li>

        <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)=='outlet'){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/outlet"><i class="fa fa-circle-o"></i> <span>Outlets</span></a></li>

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

<!-- ########################################################################################################### -->
  <li class="treeview <?php

  if($this->uri->segment(1)=="Allotment")
  {echo "active";}
   else if($this->uri->segment(1)=="ReceiveItem")
  {echo "active";}

  else if($this->uri->segment(1)=="Feeds")
  {echo "active";}
  else if($this->uri->segment(1)=="FeedPurchase")
  {echo "active";}

  else if($this->uri->segment(1)=="ProductManagement")
  {echo "active";}
  ?>">
  <a><i class="fa fa-pie-chart"></i><span>Production</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="<?php if($this->uri->segment(1)=="Allotment"){echo "active";}?>" ><a  href="<?php echo base_url();?>Allotment"><i class="fa fa-file-text-o"></i> <span>Allot Item</span></a></li>
    <li class="<?php if($this->uri->segment(1)=="ReceiveItem"){echo "active";}?>" ><a  href="<?php echo base_url();?>ReceiveItem"><i class="fa fa-file-text-o"></i> <span>Receive back/Integration</span></a></li>


    <li class="<?php if($this->uri->segment(1)=="FeedPurchase"){echo "active";}?>" ><a  href="<?php echo base_url();?>FeedPurchase"><i class="fa fa-file-text-o"></i> <span>Feeds Purchase Details</span></a></li>
    <li class="<?php if($this->uri->segment(1)=="Feeds"){echo "active";}?>" ><a  href="<?php echo base_url();?>Feeds"><i class="fa fa-file-text-o"></i> <span>Feeding Details</span></a></li>
    <li class="<?php if($this->uri->segment(1)=="FeedStock"){echo "active";}?>" ><a  href="<?php echo base_url();?>FeedStock"><i class="fa fa-file-text-o"></i> <span>Feed Stock</span></a></li>

    <li class="<?php if($this->uri->segment(1)=="ProductManagement" && $this->uri->segment(2)==""){echo "active";}?>" ><a  href="<?php echo base_url();?>ProductManagement"><i class="fa fa-file-text-o"></i> <span>Manage Products</span></a></li>
    <li class="<?php if($this->uri->segment(1)=="ProductManagement" && $this->uri->segment(2)=="showProductionDetails"){echo "active";}?>" ><a  href="<?php echo base_url();?>ProductManagement/showProductionDetails"><i class="fa fa-file-text-o"></i> <span>Production Details</span></a></li>

  </ul>
</li>
<li class="treeview <?php
      if($this->uri->segment(1)=="Voucherhead")
                {echo "active";}

     else if($this->uri->segment(1)=="Receipthead")
                {echo "active";}

    else if($this->uri->segment(1)=="Voucher")
                {echo "active";}


     else if($this->uri->segment(1)=="Receipt")
                {echo "active";}

      //else if($this->uri->segment(1)=="GLedger_head")
              //  {echo "active";}

    //   else if($this->uri->segment(1)=="Journal")
        //{echo "active";}


      else if($this->uri->segment(1)=="Daybook")
                {echo "active";}

       else if($this->uri->segment(1)=="Ledger")
                {echo "active";}

      else if($this->uri->segment(1)=="Balancesheet")
                {echo "active";}



      // else if($this->uri->segment(1)=="GIncome")
              //  {echo "active";}

        ?>">
          <a href="#"><i class="fa fa-money"></i><span> Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    <ul class="treeview-menu ">
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

       <!-- <li class="<?php //if($this->uri->segment(1)=='GLedger_head' && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>GLedger_head"><i class="fa fa-circle-o"></i>Ledger Head</a></li>-->


     <!-- <li class="<?php //if($this->uri->segment(1)=='Journal' && $this->uri->segment(2)==''){echo "active";}?>" ><a href="<?php echo base_url();?>Journal"><i class="fa fa-circle-o"></i>Journal Entry</a></li>-->



      <li class="<?php if($this->uri->segment(1)=="Daybook"){echo "active";}?>" ><a  href="<?php echo base_url();?>Daybook"><i class="fa fa-circle-o"></i> <span>Daybook</span></a></li>
      <li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="fa fa-circle-o"></i> <span>Ledger</span></a></li>

      <li class="<?php if($this->uri->segment(1)=="Balancesheet"){echo "active";}?>" ><a  href="<?php echo base_url();?>Balancesheet"><i class="fa fa-circle-o"></i> <span>Balance Sheet</span></a></li>





      <!--<li class="<?php //if($this->uri->segment(1)=="GIncome"){echo "active";}?>" ><a  href="<?php //echo base_url();?>GIncome"><i class="fa fa-circle-o"></i> <span>Income And Expenditure A/c</span></a></li>-->

    </ul>
        </li>

<!-- ########################################################################################################## -->
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
  <li class="<?php if($this->uri->segment(1)=="Sales"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>Sales"><i class="fa fa-shopping-cart"></i>
      <span>Sales</span>
    </a>
  </li>

  <li class="<?php if($this->uri->segment(1)=="Product"){echo "active";}?>" ><a  href="<?php echo base_url();?>Product"><i class="fa fa-shopping-cart"></i> <span>Items</span></a></li>
  <li class="<?php if($this->uri->segment(1)=="Purchase"){echo "active";}?>" ><a  href="<?php echo base_url();?>Purchase"><i class="fa fa-file-powerpoint-o"></i> <span>Purchase</span></a>
    <li class="<?php if($this->uri->segment(1)=="Stockmovement"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stockmovement"><i class="fa fa-th"></i> <span>Master Stock</span></a></li>
    <li class="<?php if($this->uri->segment(1)=="Stockdetails"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stockdetails"><i class="fa fa-th"></i> <span>Branch Stock</span></a></li>
  </li>

<?php } ?>
</ul>
</li>

<li class="treeview <?php

if($this->uri->segment(1)=="Distribution")
{echo "active";}
 else if($this->uri->segment(1)=="FCR")
 {echo "active";}

 else if($this->uri->segment(1)=="Commission")
 {echo "active";}
?>">
<a><i class="fa fa-pie-chart"></i><span>Distribution</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="Distribution"){echo "active";}?>" ><a  href="<?php echo base_url();?>Distribution"><i class="fa fa-file-text-o"></i> <span>Distribution</span></a></li>
</ul>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="FCR"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>FCR"><i class="fa fa-file-text-o"></i> <span>Feed Conversion Ratio</span></a></li>
</ul>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="Commission"){echo "active";}?>" ><a  href="<?php echo base_url();?>Commission"><i class="fa fa-file-text-o"></i> <span>Commission Management</span></a></li>
</ul>
</li>


<li class="treeview <?php
if($this->uri->segment(1)=="Vehicles")
{echo "active";}

else if($this->uri->segment(1)=="Drivers")
{echo "active";}


else if($this->uri->segment(1)=="TravelDetails")
{echo "active";}

else if($this->uri->segment(1)=="Maintanance")
{echo "active";}

else if($this->uri->segment(1)=="Vehicles_root")
{echo "active";}
?>">
<a><i class="fa fa-pie-chart"></i><span>Vehicles</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="Vehicles"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>Vehicles"><i class="fa fa-file-text-o"></i><span>Vehicles </span></a></li>
</ul>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="Drivers"){echo "active";}?>"><a  href="<?php echo base_url();?>Drivers"><i class="fa fa-file-text-o"></i> <span>Drivers </span></a></li>
</ul>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="TravelDetails"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>TravelDetails"><i class="fa fa-file-text-o"></i><span>Travel Details</span></a></li>
</ul>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="Maintanance"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>Maintanance"><i class="fa fa-file-text-o"></i><span>Maintanance History</span></a></li>
</ul>

<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="Vehicles_root"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>Vehicles_root"><i class="fa fa-file-text-o"></i><span>Root Map</span></a></li>
</ul>
</li>

<li class="treeview <?php
if($this->uri->segment(1)=="Shares")
{echo "active";}
else if($this->uri->segment(1)=="Purchase")
{echo "active";}
?>">
<a><i class="fa fa-pie-chart"></i><span>Shares</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="Shares"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>Share/"><i class="fa fa-file-text-o"></i> <span>Shares</span></a></li>
</ul>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="SharePurchase"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>SharePurchase/"><i class="fa fa-file-text-o"></i> <span>Share Purchase Details</span></a></li>
</ul>
</li>


<li class="treeview <?php
if($this->uri->segment(1)=="Stock")
{echo "active";}
?>">
<a><i class="fa fa-pie-chart"></i><span>Stock Management</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="<?php if($this->uri->segment(1)=="Shares"){echo "active";}?>" >
    <a  href="<?php echo base_url();?>Stock"><i class="fa fa-file-text-o"></i> <span>Stock Details</span></a></li>
</ul>

</li>
</ul>
<ul class="sidebar-menu" id="navi">
    <li class="<?php if($this->uri->segment(1)=="Reminders"){echo "active";}?>" >
      <a  href="<?php echo base_url();?>Reminders"><i class="fa fa-file-text-o"></i> <span>Reminders</span></a></li>
</ul>
<ul class="sidebar-menu" id="navi">
    <li class="<?php if($this->uri->segment(1)=="ReceiveItem"){echo "active";}?>" ><a  href="<?php echo base_url();?>Vaccination"><i class="fa fa-file-text-o"></i> <span>Vaccination Management</span></a></li>
</ul>
</section>
</aside>
