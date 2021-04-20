<?php $this->load->view('common/header'); ?>
<!--================================================================================================================================-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leads</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Leads List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
            <div class="loading" id="demo" style="display: none;">Loading&#8230;</div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a href="<?php echo site_url('Leads/addLeads')?>"><button class="btn btn-primary btn-md ">
                  <i class="nav-icon fa fa-plus"></i> Add Leads</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Leads Name </th>
                    <th>Leads Image </th>
                    <th>Leads Gmail </th>
                    <th>LeadsMobile No </th>
                    <th>status</th>
                    <th>Staff Name</th>
                    <th>Date</th>
                    <th>StampUserName</th>
                    <td>Convert Customer</td>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(isset($records)){
                      foreach($records as $record){
                    ?>
                    <tr>
                      <td><?php echo $record->id; ?></td>
                      <td><?php echo $record->c_name; ?></td>
                      <td><img src="<?php echo base_url();?>images/LeadsandCustomer/<?php echo $record->image; ?>" alt="img" width="50px" heigth="50px" ></td>
                      <td><?php echo $record->email; ?></td>
                      <td><?php echo $record->mobileno; ?></td>
                      <td> <?php echo $record->status ?></td>
                      <td><?php echo $record->staffname; ?></td>
                      <td><?php echo "$record->stampdate"; ?></td>
                      <td><?php echo "$record->stampusername"; ?></td>
                      <td>
                      <a class="btn btn-success btn-sm" href="<?php echo site_url('Leads/converCustomer/').$record->id; ?>">ConvertCustomer</a> 
                        &nbsp;&nbsp;&nbsp;
                      </td>
                      <td>
                        <a class="btn btn-info btn-sm" href="<?php echo site_url('Leads/getdetailLeads/').$record->id; ?>".><i class="fas fa-pencil-alt" ></i> Edit</a>
                      </td>
                    </tr>
                    <?php }} ?>
                   </tbody>
                </table>
              </div>
              <!-- /.card-body -->  
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

  <script>  
 $(document).ready(function(){  

  <?php if($this->session->flashdata('delete')){ ?>
      toastr.error('  Successfully Product Delete .  ')    
  <?php } ?>
  <?php if($this->session->flashdata('insert')){ ?>
    toastr.success(' Successfully Product Add  ')
  <?php } ?>
  <?php if($this->session->flashdata('update')){ ?>
    toastr.success(' Successfully Product Update ')
  <?php } ?>


$(".Leadslist").addClass("active");
});
</script>

<?php $this->load->view('common/footer'); ?>
