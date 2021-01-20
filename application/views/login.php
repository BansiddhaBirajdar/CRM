<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>C R M | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assetes/dist/img/Urbanfit.ico"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetes/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b><span class="text-primary">C</span><span class="text-danger"> R</span><span class="text-warning"> M</span></b>
    
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo site_url('Login/verify'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"  name="pass" class="form-control" id="myInput" placeholder="Password" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" onclick="myFunction()">
              <label for="remember">
                Show Password
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
     <spam type="button" class="btn btn-default text-primary" data-toggle="modal" data-target="#modal-default">
                  I forgot my password
                </span>
      </p>
      <div class="social-auth-links text-center mb-3">
        <?php if($this->session->flashdata('warning')){ ?>
                  <p style="color: red;"><?php echo $this->session->flashdata('warning'); ?></p>
        <?php } ?>
        
        
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

	<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Forgot password</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="card card-primary">
            <form role="form" method="post" id="upload_form" enctype="multipart/form-data">
              <div class="card-header bg-primary">Forgot password</div>
              <div class="card-body">
                <div class="input-group mb-3">
          			<input type="email" class="form-control" placeholder="Email" required="required">
          			<div class="input-group-append">
            			<div class="input-group-text">
              			<span class="fas fa-envelope"></span>
            			</div>
          			</div>
        		</div>  
               </div>
              </div>
              <div class="card-footer">
                <button  type="submit" name="upload" id="upload" class="btn btn-primary" >Send Password</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assetes/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assetes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assetes/dist/js/adminlte.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>
