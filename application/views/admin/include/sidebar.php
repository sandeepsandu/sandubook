<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->


      <ul class="sidebar-menu">
        <li id="master" class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li id="view_Customers" class=""><a href="<?= base_url('admin/customers'); ?>"><i class="fa fa-circle-o"></i>Customer</a></li>
                <li id="view_Custgroup" class=""><a href="<?= base_url('admin/custgroup'); ?>"><i class="fa fa-circle-o"></i>Customer Group</a></li>

                <li id="view_Supplier" class=""><a href="<?= base_url('admin/supplier'); ?>"><i class="fa fa-circle-o"></i>Supplier</a></li>

                <li id="view_suplrgroup" class=""><a href="<?= base_url('admin/suplrgroup'); ?>"><i class="fa fa-circle-o"></i>Supplier Group</a></li>
                <li id="view_Supplier" class=""><a href="<?= base_url('admin/bank'); ?>"><i class="fa fa-circle-o"></i>Bank</a></li>

                <li id="view_bankgroup" class=""><a href="<?= base_url('admin/bankgroup'); ?>"><i class="fa fa-circle-o"></i>Bank Group</a></li>


                <li id="view_ledgergp" class=""><a href="<?= base_url('admin/ledgergroup'); ?>"><i class="fa fa-circle-o"></i>Ledger Group</a></li>


                <li id="view_godown" class=""><a href="<?= base_url('admin/godown'); ?>"><i class="fa fa-circle-o"></i>Godown</a></li>

                <li id="view_Supplier" class=""><a href="<?= base_url('admin/users'); ?>"><i class="fa fa-circle-o"></i>Users</a></li>


            </ul>
          </li>
          <li id="currency" class="treeview">
              <a href="<?= base_url('admin/currency'); ?>">
                  <i class="fa fa-laptop"></i>
                  <span>Currency Viewer</span>
                  <span class="pull-right-container">

            </span>
              </a></li>
          <li id="transaction" class="treeview">
              <a href="#">
                  <i class="fa fa-bank"></i> <span>Transaction</span>
                  <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                  <li id="view_purchase" class=""><a href="<?= base_url('admin/purchase'); ?>"><i class="fa fa-circle-o"></i>Purchase</a></li>
                  <li id="view_sale" class=""><a href="<?= base_url('admin/sale'); ?>"><i class="fa fa-circle-o"></i>Sale</a></li>
                  <li id="view_NSD" class=""><a href="<?= base_url('admin/nsd'); ?>"><i class="fa fa-circle-o"></i>NSD</a></li>
                  <li id="view_cashbank" class=""><a href="<?= base_url('admin/cashbank'); ?>"><i class="fa fa-circle-o"></i>Cash/Bank</a></li>
                  <li id="view_stocktransfer" class=""><a href="<?= base_url('admin/stocktransfer'); ?>"><i class="fa fa-circle-o"></i>Stock Transfer</a></li>

                  <li id="view_ledger" class=""><a href="<?= base_url('admin/ledger'); ?>"><i class="fa fa-circle-o"></i>General Ledger</a></li>

              </ul>
          </li>
          <li id="report" class="treeview">
              <a href="#">
                  <i class="fa fa-bar-chart"></i> <span>Reports</span>
                  <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                  <li id="report_purchase" class=""><a href="<?= base_url('report/purchase'); ?>"><i class="fa fa-circle-o"></i>Purchase</a></li>
                  <li id="report_sale" class=""><a href="<?= base_url('report/sale'); ?>"><i class="fa fa-circle-o"></i>Sale</a></li>
                  <li id="report_sale" class=""><a href="<?= base_url('report/outstandingcust'); ?>"><i class="fa fa-circle-o"></i>Outstanding Customer</a></li>
                  <li id="report_sale" class=""><a href="<?= base_url('report/outstandingsuplr'); ?>"><i class="fa fa-circle-o"></i>Outstanding Supplier</a></li>
                  <li id="report_nsd" class=""><a href="<?= base_url('report/nsd'); ?>"><i class="fa fa-circle-o"></i>NSD</a></li>
                  <li id="report_ledger" class=""><a href="<?= base_url('report/ledger'); ?>"><i class="fa fa-circle-o"></i>Ledger</a></li>


              </ul>
          </li>

      </ul>


    </section>
    <!-- /.sidebar -->
  </aside>

  

