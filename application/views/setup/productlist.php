<?php $this->load->view('common/header'); ?>
<!--================================================================================================================================-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
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
                <a href="<?php echo site_url('Setup/productsaddfrom')?>"><button class="btn btn-primary btn-md ">
                  <i class="nav-icon fa fa-plus"></i> Add Product</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Product Name </th>
                    <th>Product Image </th>
                    <th>status</th>
                    <th>StampDate</th>
                    <th>StampUserName</th>
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
                      <td><?php echo $record->productname; ?></td>
                      <td><img src="<?php echo base_url();?>images/product/<?php echo $record->productimage; ?>" alt="img" width="50px" heigth="50px" ></td>
                      <?php if($record->status=='Y'){ ?>
                      <td><i class="fa fa-check" style="color:green"></i></td>
                      <?php }else{ ?>
                      <td><i class="fa fa-times" style="color:red"></i></td>
                      <?php } ?>
                      <td><?php echo "$record->stampdate"; ?></td>
                      <td><?php echo "$record->stampusername"; ?></td>
                      <td> 
                        <a class="btn btn-info btn-sm" href="<?php echo site_url('Setup/getdetailproduct/').$record->id; ?>".><i class="fas fa-pencil-alt" ></i> Edit</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger btn-sm " href="<?php echo site_url('Setup/deleteProduct/').$record->id; ?>".><i class="fas fa-trash" ></i> Delete</a>
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


$(".Product").addClass("active");
});
</script>

<?php $this->load->view('common/footer'); ?>
