<div class="modal fade" id="modal-default">
        <div class="modal-dialog" >
          <div class="modal-content" style="width: 800px">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Forgot password</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            	<div class="card card-primary">
              		<div class="card-header">
								<h3 class="card-title">Add Staff</h3>
              		</div>
              		<div class="card-body">
              			<!-- /.card-header -->
			  			<!-- form start -->
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
											  <option value='<?php if(isset($record)){echo $dept->id; }else{ echo $dept->id;} ?>' <?php if(isset($record)){ if($record->catid==$dept->id){ echo'selected="selected"';}} ?> >
											  	<?php echo $dept->name; ?></option>
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
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 		
	                	</div>
	              		</form>
	              	</div>
	           	</div>
	            <!-- /.card -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	
      <div class="modal fade" id="modal-edit">
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
              <div class="card-header bg-primary">Edit Department</div>
              <div class="card-body">
              	<div class="row">
                <div class="input-group mb-3">
          			<input type="text" class="form-control" placeholder="Department Name">
        		</div>
        		<div class="col-sm-6">
        			<div class="form-group clearfix">
                      <div class="icheck-primary ">
                        <input type="checkbox" id="checkboxPrimary1">
                        <label for="checkboxPrimary1" style="margin-left: 10px;">
                        	Leads
                        </label>
                      </div>
                      <div class="icheck-primary ">
                        <input type="checkbox" id="checkboxPrimary2">
                        <label for="checkboxPrimary2" style="margin-left: 10px;">
                        	Customers
                        </label>
                      </div>
                      <div class="icheck-primary ">
                        <input type="checkbox" id="checkboxPrimary3">
                        <label for="checkboxPrimary3" style="margin-left: 10px;">
                          Sales
                        </label>
                      </div>
                      <div class="icheck-primary ">
                        <input type="checkbox" id="checkboxPrimary4">
                        <label for="checkboxPrimar4" style="margin-left: 10px;">
                          Projects
                        </label>
                      </div>
                      <div class="icheck-primary ">
                        <input type="checkbox" id="checkboxPrimary5">
                        <label for="checkboxPrimar5" style="margin-left: 10px;">
                          Tasks
                        </label>
                      </div>
                    </div>
             	</div>
                 </div>  
               </div>
              </div>
              <div class="card-footer">
                <button  type="submit" name="upload" id="upload" class="btn btn-primary" >Edit</button>
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
