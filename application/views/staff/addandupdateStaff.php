<?php $this->load->view('common/header'); ?>
<!--=========================================================================================================================-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <?php if(isset($record)){ ?>
		  <h1> Sub Category Master 2 Update Form</h1>
		  <?php }else{?>
			<h1>Sub Category Master 2 Add Form</h1>
			<?php } ?>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard')?>">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/SubCategoryMaster2/index')?>">Sub Category Master 2</a></li>
			  <?php if(isset($record)){?><li class="breadcrumb-item active" id='adduser'>Update </li>
			  <?php }else{ ?>
				<li class="breadcrumb-item active" id='adduser'>Add </li>
			  <?php } ?>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md">
          	<div class="card card-primary">
              <div class="card-header">
        			  <?php if(isset($record)){?>
        				<h3 class="card-title">Update Main Category Master</h3>
        				<?php }else{ ?>
        				<h3 class="card-title">Add Main Category Master </h3>
        				<?php } ?>
              </div>
              <div class="card-body">
            <!-- general form elements -->
           <?php if(!isset($record)){?>
              			<form role="form" method="post" action="<?php echo(base_url('admin/UserMaster/addData')); ?>" enctype="multipart/form-data">
			  			<?php }else{?>
						<form role="form" method="post" action="<?php echo(site_url('admin/UserMaster/updateData/'.$record->id));?>" enctype="multipart/form-data">
						<?php }?>
						<div class="row">
              				<div class="col-md-6">
								<div class="form-group">
	                    			<label for="exampleInputName1">Name</label>
	                    			<input type="text" class="form-control" id="exampleInputName" name="name" value="<?php if(isset($record)){ echo $record->name;}else {echo'';} ?>" placeholder="Enter Name" required>
	                  			</div>
                  			</div>
                  			<div class="col-md-6">
					            <div class="form-group">
					                <label for="exampleInputEmail1">Email address</label>
					                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php if(isset($record)){ echo $record->email;}else {echo'';} ?>"  placeholder="Enter email" required>
					            </div>
					        </div>
					        <div class="col-md-6">
					            <div class="form-group">
							        <label for="exampleFormControlFile1"> Profile Picture</label><span class="required" style="color: red">*</span></label><span id="checkno1" style="display:none">Select Image file</span>
							        <input type="file" class="form-control " id="photo1" name="photo" value="<?php if(isset($record)){ echo $record->profile;}else{echo""; } ?>" <?php if(!isset($record)){ echo 'required="required"';}?>>
							        <?php if(isset($record)){ 
							        	?>
							   	    <img src="<?php echo $record->profile; ?>" alt="img" width="50px" heigth="50px" style="margin: 15px;" >
	              					<?php echo $record->profile; } ?>
  								</div>
					        </div>
					        <div class="col-md-6">
					        	<div class="form-group">
	                    			<label for="exampleInputMobile">MobileNo <span id="checkno" style="display:none">Check Mobile Number</span></label>
	                    			<input type="text" class="form-control"  onchange="mobile()" id="mobileno" name="mobileno" value="<?php if(isset($record)){ echo $record->mobile;}else {echo'';} ?>" placeholder="Enter Mobile Number" required>
	                  			</div>
					        </div>
					        <div class="col-md-6">
					        	<?php if(!isset($record)){ ?>			
			            			<div class="form-group">
						                    <label for="exampleInputPassword1">Password</label>
						                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
									</div>
								<?php } ?>
					        </div>
					        
					        <div class="col-sm-6">
					                <div class="form-group ">
											<label class>Department<span class="required">*</span></label>
											<select class="form-control" name="department" required>
												<?php if(!isset($record)){ ?>
											  <option value="">None</option>
												<?php } ?> 	
												<?php foreach ($department as $dept) { ?>														
											  <option value='<?php if(isset($record)){echo $dept->id; }else{ echo $dept->id;} ?>' <?php if(isset($record)){ if($record->depcode==$dept->id){ echo'selected="selected"';}} ?> >
											  	<?php echo $dept->dname; ?></option>
												<?php } ?>
											</select>
					                </div>
								</div>
					        <div class="col-sm-6">
					            <div class="form-group ">
									<label class>Status<span class="required">*</span></label>
									<select class="form-control" name="status" required>
									<option value="Y" <?php if(isset($record)){ if($record->status=='Y'){ echo'selected="selected"';}}?> selected>Active</option>
									<option value="N" <?php if(isset($record)){ if($record->status=='N'){ echo'selected="selected"';}}?>>Not Active</option>
									</select>
					            </div>
							</div>
							<div class="col-sm-6">
					            <div class="form-group ">
									<label class>Gender<span class="required">*</span></label>
									<select class="form-control" name="status" required>
									<option value="M" <?php if(isset($record)){ if($record->status=='M'){ echo'selected="selected"';}}?> selected>Male</option>
									<option value="F" <?php if(isset($record)){ if($record->status=='F'){ echo'selected="selected"';}}?>>Female</option>
									</select>
					            </div>
							</div>
							<div class="col-md-12">
					        	<div class="form-group">
                                  <label>Address</label>
                                  <textarea class="form-control"   name="address" placeholder="Enter Address" required><?php if(isset($record)){ echo $record->address;}?></textarea>
                                </div>
					        </div>



                  		</div>
	            			<!-- /.card-body -->
	                	<div class="card-footer">
								<?php if(!isset($record)){ ?>
	                  				<button type="submit" id="addstaff" class="btn btn-primary">Submit</button>
					  		 	<?php }else{?> 
									<button type="submit" class="btn btn-primary">Update</button>
								<?php } ?>
								<a href="<?php echo site_url('Staff/manageStaff')?>" class="btn btn-danger">Back</a>
 		
	                	</div>
	              		</form>
	              	</div>
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
<script type="text/javascript">

$(document).ready(function(){
$('#mobileno').change(function(){
  	 var x = $('#mobileno').val();
	var numbers = /^[0-9]+$/;
     var check=x.match(numbers);
	if( x.length!=10 || (check==null) ){
			
			var obj = document.getElementById("checkno");
			const button =document.getElementById("addstaff");
			button.disabled = true;
			obj.setAttribute("style", "display: block; display: inline; color:red;");			
		}
		else{
			const button =document.getElementById("addstaff");
			button.disabled = false;
			document.getElementById("checkno").style.display = "none";	
		}

 });


$('#photo1').change(function(){
    var i = $('#photo1').val().split(".");  
    if(i[i.length-1]!= '' && i[i.length-1]!='jpg' && i[i.length-1]!='jpeg' && i[i.length-1]!='png' && i[i.length-1]!='gif')  
    {  
      var obj = document.getElementById("checkno1");
      const button =document.getElementById("addstaff");
      button.disabled = true;
      obj.setAttribute("style", "display: block; display: inline; color:red;");
      // document.getElementById().style.display = "block";     
    }
    else{
      const button =document.getElementById("addstaff");
      button.disabled = false;
      document.getElementById("checkno1").style.display = "none";  
    }
   });
 
 });

</script>

<?php $this->load->view('common/footer'); ?>