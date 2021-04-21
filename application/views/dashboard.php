<?php $this->load->view('common/header'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>

                <p>Total Project</p>
              </div>
              <div class="icon">
                <i class="ion ion-filing"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>

                <p>Total Proposals</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0</h3>
                <p>Total Estimates</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>

                <p>Total Invoices</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <section class="col-lg-8 connectedSortable">
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-line mr-1"></i>
                  Customer
                </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- Morris chart - Sales -->

                    <canvas id="myChart" width="700px" height="300px"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            
          </section>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">


var data1=<?php echo $data; ?>;
// alert(data[0].count);

var labels = data1.map(function(e) {
   return e.month;
});
var data = data1.map(function(e) {
   return e.count;
});
    var ctx = document.getElementById('myChart');

var myChart = new Chart(ctx, {
  type: 'line',
  data: {
  labels:labels,
  datasets: [{
    label: 'Customer',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data:data,
    }]
  },

  options: {
    responsive:false,
    title:{
      display:true,
      text:"Bar Chart",
      position:"bottom",
      fontSize:25
    },
  }
});
  </script>
<?php $this->load->view('common/footer'); ?>