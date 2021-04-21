<?php $this->load->view('common/header');?>
<!--=========================================================================================================================-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php if(isset($record)){ ?>
            <h1>Update Product</h1>
            
            <?php }else{?>
            <h1>Add Product</h1>
            
            <?php } ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashborad</a></li>
              <li class="breadcrumb-item"><a href="#">Proucts List</a></li>
              <li class="breadcrumb-item active"><?php if(isset($record)){ ?> Update Product <?php }else{?> Add Product <?php } ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <?php if(isset($record)){?>
                            <h3 class="card-title">Update Prouct</h3>
                            <?php }else{ ?>
                            <h3 class="card-title">Add Product </h3>
                            <?php } ?>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if(!isset($record)){?>
                        <form role="form" method="post" action="<?php echo site_url('Setup/insertproducts'); ?>" id="upload_form" enctype="multipart/form-data">
                            <?php }else{ ?>
                            <form role="form" method="post" action="<?php echo site_url('Setup/updateproducts/'.$record->id); ?>" enctype="multipart/form-data">
                                <?php } ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" id="exampleInputName" name="productname" value="<?php if(isset($record)){ echo $record->productname;}else {echo'';} ?>" placeholder="Enter Product Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Images<span class="required" style="color: red">*</span></label><span id="checkno" style="display:none">Select Image file</span>
                                                <input type="file" class="form-control " id="image_file" name="photo"
                                                    value="<?php if(isset($record)){ echo $record->productimage;}else{echo""; } ?>"
                                                    <?php if(!isset($record)){ echo 'required="required"';}?> accept="image/*">
                                                <?php if(isset($record)){ ?>
                                                <img src="<?php echo base_url()."/images/product/".$record->productimage; ?>"
                                                    alt="img" width="50px" heigth="50px" style="margin: 15px;">
                                                <?php echo $record->productimage; } ?>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label class>Status<span class="required">*</span></label>
                                                <select class="form-control" name="status" required>
                                                  
                                                    <option value="Y"
                                                        <?php if(isset($record)){ if($record->status=="Y"){ echo'selected="selected"';}}?>
                                                        selected>Active</option>
                                                    <option value="N"
                                                        <?php if(isset($record)){ if($record->status=="N"){ echo'selected="selected"';}}?>>
                                                        In Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <?php if(!isset($record)){ ?>
                                    <button type="submit" name="upload" id="upload"
                                        class="btn btn-primary">Submit</button>

                                    <?php }else{?>
                                    <button type="submit" name="upload" id="upload"
                                        class="btn btn-primary">Update</button>
                                    <?php } ?>
                                    <a href="<?php echo site_url('Setup/productsList')?>" class="btn btn-danger">
                                        Back</a>
                                </div>

                            </form>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
</div>
<!--=========================================================================================================================-->
<?php $this->load->view('common/footer'); ?>