<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ------------------------------------------------------------------------------------------------------------------- -->
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assetes/plugins/jquery/jquery.min.js"></script>

  <link rel="icon" type="image/png" href="<?php echo base_url();?>assetes/dist/img/Urbanfit.ico"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
 <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetes/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assetes/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- loader -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetes/dist/css/loader.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark bg-primary">

  <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?php echo site_url('Dashboard')?>" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <span style="color:black;font-size: :20px;" >Last Login :
        <?php if($this->session->userdata('lastlogin')){
                $str_arr = preg_split ("/\ /", $this->session->userdata('lastlogin')); ?>
          <span style="color:white;font-size: :10px;" class="font-weight-bload"><?php echo $str_arr[0]; ?></span> &nbsp;&nbsp;
          Time:<span style="color:white;font-size: :10px;" > <?php echo $str_arr[1]; ?></span>
          </span>
        <?php }else { 
            redirect('Login');
        }

          ?>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('Dashboard')?>" class="brand-link bg-warning">
      <img src="<?php echo base_url(); ?>assetes/dist/img/Urbanfit.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold text-black">C <span style="color: red;"> R </span> M </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="image">
          <img src="<?php echo base_url(); ?>images/staff/<?php echo $this->session->userdata('profile');?>" class="img-circle elevation-1" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo site_url('Staff/getByIdDataStaff/').$this->session->userdata('stampuserid'); ?>" class="d-block"> C_R_M : <?php echo $this->session->userdata('stampusername');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo site_url('Dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tty"></i>
              <p>
                Leads
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Leads/addLeads')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Leads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Leads</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="<?php echo site_url('')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Call History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appointments</p>
                </a>
              </li> -->
            </ul>  
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Customer</p>
                </a>
              </li>
<!--               <li class="nav-item">
                <a href="<?php echo site_url('')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Call History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appointments</p>
                </a>
              </li> -->
            </ul>
            
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-archive"></i>
              <p>
                Daily
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Daily/noticeList')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Daily/quoteList')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Quote</p>
                </a>
              </li>
            </ul>  
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Staff
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Staff/addStaff')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Staff/manageStaff')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Staff</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" id="Setup">
              <i class="nav-icon fa fa-play"></i>
              <p>
                Setup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item ">
                <a href="<?php echo site_url('Staff/manageDepartment')?>" class="nav-link Department">
                  <i class="fab fa-black-tie nav-icon "></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Setup/sourceList')?>" class="nav-link Source">
                  <i class="fab fa-sourcetree nav-icon"></i>
                  <p>Source</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Setup/productsList')?>" class="nav-link Product">
                  <i class="fas fa-shopping-cart nav-icon"></i>
                  <p>Products</p>
                </a>

              <li class="nav-item">
                <a href="<?php echo site_url('Setup/issueList')?>" class="nav-link Issue">
                  <!-- <i class="fas fa-question"></i> -->
                  <i class="fas fa-question nav-icon"></i>
                  <p>Issue</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Setup/countryList')?>" class="nav-link Country">
                  <i class="fas fa-globe-americas nav-icon"></i>
                  <p>Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Setup/stateList')?>" class="nav-link State">
                  <i class="fas fa-building nav-icon"></i>
                  <p>State</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Setup/cityList')?>" class="nav-link City">
                  <i class="fas fa-landmark nav-icon"></i>
                  <p>City</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Setup/pincodeList')?>" class="nav-link Pincode">
                  <i class="fas fa-map-pin nav-icon"></i>
                  <p>Pincode</p>
                </a>
              </li>
            </ul>
            
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Dashboard/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"> </i>
              <p>
                  Logout
              </p>
            </a>
          </li>
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  