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
        else if($this->uri->segment(1)=="Basicinfo")
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
            <!-- <li class="<?php if($this->uri->segment(1)=="Panchayath"){echo "active";}?>" ><a href="<?php echo base_url();?>Panchayath"><i class="fa fa-circle-o"></i><span>Panchayath</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="District"){echo "active";}?>" ><a  href="<?php echo base_url();?>District"><i class="fa fa-circle-o"></i> <span>District</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="State"){echo "active";}?>" ><a  href="<?php echo base_url();?>State"><i class="fa fa-circle-o"></i> <span>State</span></a></li> -->
            <li class="<?php if($this->uri->segment(1)=="Mlogin"){echo "active";}?>" ><a  href="<?php echo base_url(); ?>Mlogin">
              <i class="fa fa-circle-o"></i> <span>Member login</span></a></li>
              <!-- <li class="<?php if($this->uri->segment(1)=="Plogin"){echo "active";}?>" ><a  href="<?php echo base_url(); ?>PanchayathLogin"> -->
                <!-- <i class="fa fa-circle-o"></i> <span>Panchayath Login</span></a></li> -->
                <li class="<?php if($this->uri->segment(1)=="Basicinfo"){echo "active";}?>" ><a  href="<?php echo base_url();?>Basicinfo"><i class="fa fa-circle-o"></i> <span>Basic Info</span></a></li>
                <!-- <li class="<?php if($this->uri->segment(1)=="Dlogin"){echo "active";}?>" ><a  href="<?php echo base_url(); ?>District_login">
                <i class="fa fa-circle-o"></i> <span>District Login</span></a></li>
                <li class="<?php if($this->uri->segment(1)=="Slogin"){echo "active";}?>" ><a  href="<?php echo base_url(); ?>StateLogin">
                <i class="fa fa-circle-o"></i> <span>State Login</span></a></li> -->
              </ul>
            </li>
            <li class="treeview <?php
            if($this->uri->segment(1)=="Member")
            {echo "active";}
            //    else if($this->uri->segment(1)=="Customer")
            // {echo "active";}
            // else if($this->uri->segment(1)=="Vendor_master")
            // {echo "active";}
            // else if($this->uri->segment(1)=="Taxdetails")
            // {echo "active";}
            ?>">
            <a><i class="fa fa-laptop"></i><span>Administration</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu ">
              <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)=='add'){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/add"><i class="fa fa-circle-o"></i> <span>Add Farm Members</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)==''){echo "active";}?>" ><a  href="<?php echo base_url();?>Member"><i class="fa fa-circle-o"></i> <span>Manage Farm Members</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)=='shareholders'){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/shareholders"><i class="fa fa-circle-o"></i> <span>Shareholders</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)=='outlet'){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/outlet"><i class="fa fa-circle-o"></i> <span>Outlets</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Direct_details"){echo "active";}?>" ><a  href="<?php echo base_url();?>Direct_details"><i class="fa fa-circle-o"></i> <span>Director Details</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)=='integrators'){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/integrators"><i class="fa fa-circle-o"></i> <span>Integrators</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(2)=='shops'){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/shops"><i class="fa fa-circle-o"></i> <span>Shop</span></a></li>
              <!--   <li class="<?php //if($this->uri->segment(2)=="Customer"){echo "active";}?>" ><a  href="<?php //echo base_url();?>Customer/"><i class="fa fa-circle-o"></i> <span>Customer Details</span></a></li>
              <li class="<?php //if($this->uri->segment(1)=="Vendor_master"){echo "active";}?>" ><a href="<?php //echo base_url();?>Vendor_master"><i class="fa fa-circle-o"></i> <span>Vendor Master</span></a></li>
              <li class="<?php //if($this->uri->segment(1)=="Taxdetails"){echo "active";}?>" ><a href="<?php //echo base_url();?>Taxdetails"><i class="fa fa-circle-o"></i> <span>Tax Master</span></a></li> -->
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
        <!-- ########################################################################################################## -->
        <li class="treeview <?php
        if($this->uri->segment(1)=="Customer")
        {echo "active";}
        else if($this->uri->segment(1)=="Vendor_master")
        {echo "active";}
        else if($this->uri->segment(1)=="Taxdetails")
        {echo "active";}
        else if($this->uri->segment(1)=="Product")
        {echo "active";}
        else if($this->uri->segment(1)=="Purchase")
        {echo "active";}
        else if($this->uri->segment(1)=="FeedPurchase")
        {echo "active";}
        else if($this->uri->segment(1)=="Feeds")
        {echo "active";}
        else if($this->uri->segment(1)=="FeedStock")
        {echo "active";}
        else if($this->uri->segment(1)=="Stock")
        {echo "active";}
        else if($this->uri->segment(1)=="Feeditem")
        {echo "active";}
        ?>">
        <a><i class="fa fa-industry"></i><span>Inventory</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
          <li class="<?php if($this->uri->segment(1)=="Customer"){echo "active";}?>" ><a  href="<?php echo base_url();?>Customer/"><i class="fa fa-circle-o"></i> <span>Customer Details</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Vendor_master"){echo "active";}?>" ><a href="<?php echo base_url();?>Vendor_master"><i class="fa fa-circle-o"></i> <span>Vendor Master</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Taxdetails"){echo "active";}?>" ><a href="<?php echo base_url();?>Taxdetails"><i class="fa fa-circle-o"></i> <span>Tax Master</span></a></li>
          <li class="<?php if($this->uri->segment(2)=="Product/itemCategory"){echo "active";}?>" ><a  href="<?php echo base_url();?>Product/itemCategory"><i class="fa fa-circle-o"></i> <span>Item Category</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Product"){echo "active";}?>" ><a  href="<?php echo base_url();?>Product"><i class="fa fa-circle-o"></i> <span>Items</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Purchaseitem"){echo "active";}?>" ><a  href="<?php echo base_url();?>Purchaseitem"><i class="fa fa-circle-o"></i> <span>Purchase</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Feeditem"){echo "active";}?>" ><a  href="<?php echo base_url();?>Feeditem"><i class="fa fa-circle-o"></i> <span>Feeds Item</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="FeedPurchase"){echo "active";}?>" ><a  href="<?php echo base_url();?>FeedPurchase"><i class="fa fa-circle-o"></i> <span>Feeds Purchase Details</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Feeds"){echo "active";}?>" ><a  href="<?php echo base_url();?>Feeds"><i class="fa fa-circle-o"></i> <span>Feeding Details</span></a></li>
          <!-- <li class="<?php if($this->uri->segment(1)=="FeedStock"){echo "active";}?>" ><a  href="<?php echo base_url();?>FeedStock"><i class="fa fa-circle-o"></i> <span>Feed Stock</span></a></li> -->
          <li class="<?php if($this->uri->segment(1)=="Stock"){echo "active";}?>" >
            <a  href="<?php echo base_url();?>Stock"><i class="fa fa-circle-o"></i> <span>Stock Details</span></a></li>
          </ul>
        </li>

        <!-- ############################################################################################################################################################################################################################## -->
        <!-- INTEGRATION SECTION -->
        <!-- ADDED BY RAJEEV -->
        <li class="treeview <?php
          if($this->uri->segment(1)=="Allotment")
          {echo "active";}
          else if($this->uri->segment(1)=="ReceiveItem")
          {echo "active";}
          else if($this->uri->segment(1)=="FCR")
          {echo "active";}
          else if($this->uri->segment(1)=="IntegratedProduction")
          {echo "active";}
          ?>">
          <a><i class="fa fa-industry"></i><span>Integration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="Allotment"){echo "active";}?>" ><a  href="<?php echo base_url();?>Allotment"><i class="fa fa-circle-o"></i> <span>Allot Item</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="ReceiveItem"){echo "active";}?>" ><a  href="<?php echo base_url();?>ReceiveItem"><i class="fa fa-circle-o"></i> <span>Receive back/Integration</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="FCR"){echo "active";}?>" ><a  href="<?php echo base_url();?>FCR"><i class="fa fa-circle-o"></i> <span>Feed Conversion Ratio</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="IntegratedProduction"){echo "active";}?>" ><a  href="<?php echo base_url();?>IntegratedProduction"><i class="fa fa-circle-o"></i> <span>Production Of Integrated</span></a></li>
          </ul>
        </li>
        <!-- END OF INTEGRATION SECTION -->
        <!-- ############################################################################################################################################################################################################################## -->
        <!-- <li class="<?php if($this->uri->segment(1)=="Vaccination"){echo "active";}?>" ><a  href="<?php echo base_url();?>Vaccination"><i class="fa fa-medkit"></i> <span>Vaccination Management</span></a></li> -->
        <li class="treeview <?php
        if($this->uri->segment(1)=="Vaccination")
        {echo "active";}
        ?>">
        <a><i class="fa fa-medkit"></i><span>Vaccination Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment(1)=="Vaccination"){echo "active";}?>" ><a  href="<?php echo base_url();?>Vaccination"><i class="fa fa-medkit"></i> <span>Vaccine details</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Vaccination"){echo "active";}?>" ><a  href="<?php echo base_url();?>VaccinationSchedule"><i class="fa fa-square"></i> <span>Vaccination Schedule</span></a></li>

        </ul>
      </li>
      <!-- ########################################################################################################### -->
      <li class="treeview <?php
      if($this->uri->segment(1)=="ProductManagement")
      {echo "active";}
      else if($this->uri->segment(2)=="showProductionDetails")
      {echo "active";}
      else if($this->uri->segment(1)=="Pstock")
      {echo "active";}
      else if($this->uri->segment(1)=="Sale")
      {echo "active";}
      else if($this->uri->segment(1)=="Progressive_details")
      {echo "active";}
      ?>">
      <a><i class="fa fa-list-alt"></i><span>Production</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($this->uri->segment(1)=="ProductManagement"){echo "active";}?>" ><a  href="<?php echo base_url();?>ProductManagement"><i class="fa fa-circle-o"></i> <span>Manage Products</span></a></li>
        <li class="<?php if($this->uri->segment(2)=="showProductionDetails"){echo "active";}?>" ><a  href="<?php echo base_url();?>ProductManagement/showProductionDetails"><i class="fa fa-circle-o"></i> <span>Production Details</span></a></li>
        <li class="<?php if($this->uri->segment(2)=="Pstock"){echo "active";}?>" ><a  href="<?php echo base_url();?>PStock/"><i class="fa fa-circle-o"></i> <span>Product Stock</span></a></li>
        <li class="<?php if($this->uri->segment(2)=="Progressive_details"){echo "active";}?>" ><a  href="<?php echo base_url();?>Progressive_details/"><i class="fa fa-circle-o"></i> <span>Progressive Details</span></a></li>
        <li class="<?php if($this->uri->segment(2)=="Sale"){echo "active";}?>" ><a  href="<?php echo base_url();?>Sale/"><i class="fa fa-circle-o"></i> <span>Sale Details</span></a></li>
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
    <a><i class="fa fa-pie-chart"></i><span>Sales</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="<?php if($this->uri->segment(1)=="Distribution"){echo "active";}?>" ><a  href="<?php echo base_url();?>Distribution"><i class="fa fa-circle-o"></i> <span>Sales</span></a></li>

        <!-- <li class="<?php if($this->uri->segment(1)=="Commission"){echo "active";}?>" ><a  href="<?php echo base_url();?>Commission"><i class="fa fa-circle-o"></i> <span>Commission Management</span></a></li> -->
      </ul>
    </li>
    <li class="treeview <?php
    if($this->uri->segment(1)=="Commission")
    {echo "active";}
    elseif($this->uri->segment(1)=="CommissionDetails")
    {echo "active";}
    elseif($this->uri->segment(1)=="individualCommission")
    {echo "active";}
    ?>">
    <a><i class="fa fa-medkit"></i><span>Commission Management</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <!-- <li class="<?php if($this->uri->segment(1)=="Commission"){echo "active";}?>" ><a  href="<?php echo base_url();?>Commission"><i class="fa fa-medkit"></i> <span>Commission Details</span></a></li> -->
      <li class="<?php if($this->uri->segment(1)=="CommissionDetails"){echo "active";}?>" ><a  href="<?php echo base_url();?>CommissionDetails"><i class="fa fa-square"></i> <span>Add Commission</span></a></li>
      <li class="<?php if($this->uri->segment(1)=="IndividualCommission"){echo "active";}?>" ><a  href="<?php echo base_url();?>CommissionHistory"><i class="fa fa-square"></i> <span>Commission History</span></a></li>
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
  <a><i class="fa fa-car"></i><span>Vehicles</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="<?php if($this->uri->segment(1)=="Vehicles"){echo "active";}?>" >
      <a  href="<?php echo base_url();?>Vehicles"><i class="fa fa-circle-o"></i><span>Vehicles </span></a></li>
      <li class="<?php if($this->uri->segment(1)=="Drivers"){echo "active";}?>" ><a  href="<?php echo base_url();?>Drivers"><i class="fa fa-circle-o"></i> <span>Drivers </span></a></li>
      <li class="<?php if($this->uri->segment(1)=="TravelDetails"){echo "active";}?>" >
        <a  href="<?php echo base_url();?>TravelDetails"><i class="fa fa-circle-o"></i><span>Travel Details</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="Maintanance"){echo "active";}?>" >
          <a  href="<?php echo base_url();?>Maintanance"><i class="fa fa-circle-o"></i><span>Maintanance History</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Vehicles_root"){echo "active";}?>" >
            <a  href="<?php echo base_url();?>Vehicles_root"><i class="fa fa-circle-o"></i><span>Rout Map</span></a></li>
          </ul>
        </li>
        <li class="treeview <?php
        if($this->uri->segment(1)=="Shares")
        {echo "active";}
        else if($this->uri->segment(1)=="SharePurchase")
        {echo "active";}
        else if($this->uri->segment(1)=="ShareSettings")
        {echo "active";}
        else if($this->uri->segment(1)=="ShareTransfer")
        {echo "active";}
        ?>">
        <a><i class="fa fa-share-alt"></i><span>Shares</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment(1)=="Shares"){echo "active";}?>" >
            <a  href="<?php echo base_url();?>Share/"><i class="fa fa-circle-o"></i> <span>Shares</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="SharePurchase"){echo "active";}?>" >
              <a  href="<?php echo base_url();?>SharePurchase/"><i class="fa fa-circle-o"></i> <span>Share Purchase Details</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="ShareSettings"){echo "active";}?>">
                <a href="<?php echo base_url();?>ShareSettings/"> <i class="fa fa-circle-o"></i> <span> Share Settings</span> </a>
              </li>
              <li class="<?php if($this->uri->segment(1)=="ShareTransfer"){echo "active";}?>">
                <a href="<?php echo base_url();?>ShareTransfer/"> <i class="fa fa-circle-o"></i> <span> Share Transfer</span> </a>
              </li>
            </ul>
          </li>
          <ul class="sidebar-menu" id="navi">
            <li class="<?php if($this->uri->segment(1)=="Reminders"){echo "active";}?>" >
              <a  href="<?php echo base_url();?>Reminders"><i class="fa fa-bell"></i> <span>Notifications & Reminders</span></a></li>
            </ul>
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
            <a href="#"><i class="fa fa-money"></i><span>Accounts</span>
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
              <a href="#"><i class="fa fa-circle-o"></i>Create account heads
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
          <li class="<?php if($this->uri->segment(1)=="Purchasereport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Purchasereport"><i class="fa fa-circle-o"></i> <span>Purchase Report</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Salereport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Salereport"><i class="fa fa-circle-o"></i> <span>Sale Report</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Travel_report"){echo "active";}?>" ><a  href="<?php echo base_url();?>Travel_report"><i class="fa fa-circle-o"></i> <span>Travel Report</span></a></li>
          <!-- <li class="<?php if($this->uri->segment(1)=="Allotment_report"){echo "active";}?>" ><a  href="<?php echo base_url();?>Allotment_report"><i class="fa fa-circle-o"></i> <span>Allotment Report</span></a></li> -->
          <!-- <li class="<?php if($this->uri->segment(1)=="Member_report"){echo "active";}?>" ><a  href="<?php echo base_url();?>Member_report"><i class="fa fa-circle-o"></i> <span>Member Report</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Attendancereport"){echo "active";}?>" >
          <a><i class="fa fa-circle-o"></i><span>Attendance Report</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu ">
      <li class="<?php if($this->uri->segment(1)=="Dailyreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>DailyAttendancereport"><i class="fa fa-circle-o"></i> <span>Daily Report</span></a></li>
      <li class="<?php if($this->uri->segment(1)=="Monthlyreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Monthlyreport"><i class="fa fa-circle-o"></i> <span>Monthly Report</span></a></li>
    </ul>-->
  </li>
</ul>
<!-- ######################################################################################### -->
<li class="treeview <?php
if($this->uri->segment(1)=="Notifications")
{echo "active";}

?>">

<a><i class="fa fa-bell"></i><span>Notifications</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu ">
  <li class="<?php if($this->uri->segment(1)=="Notifications"){echo "active";}?>" ><a  href="<?php echo base_url();?>Notifications"><i class="fa fa-plus"></i> <span>Add notification</span></a></li>
</li>
</ul>

<!-- ################################################################################# -->
<!-- <li class="treeview <?php
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
<a  href="<?php echo base_url();?>Stock"><i class="fa fa-circle-o"></i> <span>Stock Details</span></a></li>
</ul>
</li>
</ul> -->
<?php } ?>
<?php if($this->session->userdata['user_type']=='1'){ ?>
  <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
  <li class="<?php if($this->uri->segment(1)=="Allotment" && $this->uri->segment(1)=="view"){echo "active";}?>" ><a  href="<?php echo base_url();?>Allotment/view"><i class="fa fa-tasks"></i> <span>Allot Item</span></a></li>
  <li class="<?php if($this->uri->segment(1)=="ReceiveItem" && $this->uri->segment(1)=="view"){echo "active";}?>" ><a  href="<?php echo base_url();?>ReceiveItem/view"><i class="fa fa-tasks"></i> <span>Receive back/Integration</span></a></li>
<?php } ?>
<?php if($this->session->userdata['user_type']=='7'){ ?>
  <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
  <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(1)=="view"){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/view"><i class="fa fa-tasks"></i> <span>Members</span></a></li>
  <li class="<?php if($this->uri->segment(1)=="Allotment" && $this->uri->segment(1)=="pview"){echo "active";}?>" ><a  href="<?php echo base_url();?>Allotment/pview"><i class="fa fa-tasks"></i> <span>Allot Item</span></a></li>
  <li class="<?php if($this->uri->segment(1)=="ReceiveItem" && $this->uri->segment(1)=="pview"){echo "active";}?>" ><a  href="<?php echo base_url();?>ReceiveItem/pview"><i class="fa fa-tasks"></i> <span>Receive back/Integration</span></a></li>
<?php } ?>
<?php if($this->session->userdata['user_type']=='6'){ ?>
  <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
  <li class="<?php if($this->uri->segment(1)=="Member" && $this->uri->segment(1)=="view"){echo "active";}?>" ><a  href="<?php echo base_url();?>Member/view"><i class="fa fa-tasks"></i> <span>Members</span></a></li>
<?php } ?>
</section>
</aside>
