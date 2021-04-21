<?php 

if($this->session->userdata('role')=='S'){
$this->load->view('common/header');   
}
else
{
 $this->load->view('common/cheader');    
}


if(isset($record)){
  if($login->staffid==$record->id){
    $email=$login->email;
    $password=$login->password;
    $status=$login->status;
  }
}

 ?>
<!--=========================================================================================================================-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php if(isset($record)){ ?>
            <h1>Update Staff Member</h1>
            
            <?php }else{?>
            <h1>Add Staff Member</h1>
            
            <?php } ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashborad</a></li>
              <li class="breadcrumb-item"><a href="#">Staff Members List</a></li>
              <li class="breadcrumb-item active"><?php if(isset($record)){ ?> Update Staff Member <?php }else{?> Add Staff Member <?php } ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php if(!isset($record)){?>
        <form role="form" method="post" action="<?php echo(base_url('staff/insertDataStaff')); ?>" enctype="multipart/form-data">
  <?php }else{?>
<form role="form" method="post" action="<?php echo(site_url('staff/UpdateDataStaff/'.$record->id));?>" enctype="multipart/form-data">
<?php }?>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Personal Details</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                  <label>Name : </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" value="<?php if(isset($record)){ echo $record->name;}else {echo'';} ?>" placeholder="Enter Name" required>
                  </div>
                  <!-- /.input group -->
               </div>

              <div class="form-group">
                  <label>US phone mask : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="mobileno" value="<?php if(isset($record)){ echo $record->mobileno;}else {echo'';} ?>"  data-inputmask='"mask": "+99 999 999-9999"' required="required" data-mask>
                  </div>
                  <!-- /.input group -->
               </div>
              <div class="form-group">
                <label for="inputDescription">Street :</label>
                <textarea id="inputDescription" name="street" class="form-control" rows="3"><?php if(isset($record)){ echo $record->street;}else {echo'';} ?></textarea>
              </div>

              <div class="form-group">
                <label for="inputStatus">Country :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                    </div>
                      <select class="form-control" name="countryid" id="country" required>
                        <option value="">Select Country</option> 
                        <?php foreach ($countries as $c) { ?>                           
                        <option value='<?php if(isset($record)){echo $c->id; }else{ echo $c->id;} ?>' <?php if(isset($record)){if($record->countryid ==$c->id ){ echo "selected";} }  ?> >
                          <?php echo $c->countryname; ?></option>
                        <?php } ?>
                      </select>
                 </div>
              </div>
              <div class="form-group">
                
                <label for="inputStatus">State</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-building"></i></span>
                    </div>
                    <select class="form-control custom-select"  name="stateid" id="state" required="required">
                  		<option value="">Select State</option>
                	</select>
                 </div>
              </div>
              <div class="form-group">
                <label for="inputStatus">City :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-landmark"></i></span>
                    </div>
                    <select class="form-control custom-select" name="cityid" id="city" required="required">
                  		<option value="">Select City</option>
                	</select>
                 </div>
              </div>
              <div class="form-group">
                <label for="inputStatus">Zip Code :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calculator"></i></span>
                    </div>
                    <select class="form-control custom-select" name="pincode" id="pincode">
                  		<option value="">Select Zipcode</option>
                	</select>
                 </div>
              </div>
              <div class="form-group">
                <label for="inputStatus">Image/Photo/Logo :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-image"></i></span>
                    </div>
                    <input type="file" id="inputClientCompany" class="form-control" name="photo" value="<?php if(isset($record)){ echo $record->image;}else{echo""; } ?>" <?php if(!isset($record)){ echo 'required="required"';}?> accept="image/*">

                 </div>
                    <?php if(isset($record)){ ?>
                    <img src="<?php echo base_url();?>images/staff/<?php echo $record->image; ?>" alt="img" width="50px" heigth="50px" style="margin: 15px;" >
                    <?php echo $record->image; } ?>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Account Login</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label>Emails : </label>
                  	<div class="input-group">
                    	<div class="input-group-prepend">
                      		<span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    	</div>
                    	<input type="text" class="form-control" name="email" value="<?php if(isset($record)){ echo $email;}else {echo'';} ?>"   required >
                	</div>
                  <!-- /.input group -->
               </div>
               <div class="form-group">
                  <label>Password : </label>
                  	<div class="input-group">
                    	<div class="input-group-prepend">
                      		<span class="input-group-text"><i class="fas fa-key"></i></span>
                    	</div>
                    	<input type="password" class="form-control" name="password" value="<?php if(isset($record)){ echo $password;}else {echo'';} ?>">
                	</div>
                  <!-- /.input group -->
               </div>
                <div class="form-group">
                <label for="inputStatus">Status :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                   <select class="form-control" name="status" required>
                  <option value="Y" <?php if(isset($record)){ if($status=='Y'){ echo'selected="selected"';}}?> selected>Active</option>
                  <option value="N" <?php if(isset($record)){ if($status=='N'){ echo'selected="selected"';}}?>>Not Active</option>
                  </select>
                 </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Company Details </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                <!-- <div class="form-group">  
                  <label>Members Id : </label>
                  	<div class="input-group">
                    	<div class="input-group-prepend">
                      		<span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    	</div>
                    	<input type="text" class="form-control" >
                	</div>
               
               </div> -->

               <div class="form-group">
                  <label>Role : </label>
                  	<div class="input-group">
                    	<div class="input-group-prepend">
                      		<span class="input-group-text"><i class="fas fa-key"></i></span>
                    	</div>
                        <select class="form-control" name="department" id="department" required>
                        <?php if(!isset($record)){ ?>
                        <option value="">None</option>
                        <?php } ?>  
                        <?php foreach ($depts as $dept) { ?>                           
                        <option value='<?php if(isset($record)){echo $dept->id; }else{ echo $dept->id;} ?>' <?php if(isset($record)){ if($record->depid==$dept->id){ echo'selected="selected"';}} ?> >
                          <?php echo $dept->dname; ?></option>
                        <?php } ?>
                      </select>
                	</div>
                  <!-- /.input group -->
               	</div>

<!--                 <div class="form-group">
                		<label for="inputStatus">Designation :</label>
                	<div class="input-group">
                    	<div class="input-group-prepend">
                      		<span class="input-group-text"><i class="fas fa-user"></i></span>
                    	</div>
                    	<input type="text" class="form-control" >
                 	</div>
              	</div> -->
              	<!-- <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div> -->
                <br>
            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>


      </div>
      <div class="row">
        <div class="col-12">
          <!-- <a href="#" class="btn btn-secondary">Cancel</a> -->
                          <a href="<?php echo site_url('Staff/manageStaff')?>" class="btn btn-danger">Back</a>
          <?php if(!isset($record)){ ?>
              <!-- <input type="submit" value="Save" class="btn btn-success float-right"> -->
              <button type="submit"  class="btn btn-success float-right">Submit</button>
              <?php }else{?> 
              <button type="submit" class="btn btn-success float-right">Update</button>
            <?php } ?>
        </div>
      </div>
      <br>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">

$(document).ready(function(){
	 $('[data-mask]').inputmask();
    //    $("#country").select2();
    //    $("#department").select2();
       
    // $("#state").select2();
    // $("#city").select2();
    // $("#pincode").select2();
    
    $('#country').change(function(){
        var country_id = $('#country').val();
        if(country_id!=''){
          var state =<?php echo json_encode($states); ?> ;
          var output = '<option value="">Select State </option>';
            for(var i=0;i<state.length;i++)
            {
              
              if(state[i].countrycode==country_id)
              {
               output =output+'<option value="'+state[i].id+'">'+state[i].statename+'</option>';
              }
            }
            $('#state').html(output);
            $('#city').html('<option value="">Select City </option>'); 
            $('#pincode').html('<option value="">Select Zipcode </option>'); 

        } 
        else{
                $('#state').html('<option value="">Select State </option>'); 
        }
    });
    $('#state').change(function(){
        var state_id = $('#state').val();
        if(state_id!=''){
          var city =<?php echo json_encode($cities); ?> ;
          var output = '<option value="">Select City </option>';
            for(var i=0;i<city.length;i++)
            {
              
              if(city[i].statecode==state_id)
              {
               output =output+'<option value="'+city[i].id+'">'+city[i].cityname+'</option>';
              }
            }
            $('#city').html(output);
            $('#pincode').html('<option value="">Select Zipcode </option>'); 

        } 
        else{
                $('#city').html('<option value="">Select City </option>'); 
        }
    });
    $('#city').change(function(){
        var city_id = $('#city').val();
        // alert(city_id);
        if(city_id!=''){
          var pin =<?php echo json_encode($pincode); ?> ;
        
          var output = '<option value="">Select Zipcode </option>';
            for(var i=0;i<pin.length;i++)
            {
              
              if(pin[i].citycode==city_id)
              {
               output =output+'<option value="'+pin[i].id+'">'+pin[i].pincode+'</option>';
              }
            }
            $('#pincode').html(output);
        } 
        else{
                $('#pincode').html('<option value="">Select Zipcode </option>'); 
        }
    });
 });


</script>
<script type="text/javascript">
  
  <?php if(isset($record)){ ?>
function myFunction(){
            var country_id = <?php echo $record->countryid; ?>;
            var state_id = <?php echo $record->stateid; ?>;
            var city_id = <?php echo $record->cityid; ?>;
            var Pincode = <?php echo $record->pincode; ?>;
            var state =<?php echo json_encode($states); ?> ;
            var output = '<option value="">Select State </option>';
            for(var i=0;i<state.length;i++)
            {
              
              if(state[i].countrycode==country_id)
              {
                if(state[i].id==state_id)
                {

                  output =output+'<option value="'+state[i].id+'"selected>'+state[i].statename+'</option>';
                }
               else{
                  output =output+'<option value="'+state[i].id+'">'+state[i].statename+'</option>';

               }
              }
            }
            $('#state').html(output);


            var city =<?php echo json_encode($cities); ?> ;
            var output = '<option value="">Select City </option>';
            for(var i=0;i<city.length;i++)
            {
              
              if(city[i].statecode==state_id)
              {

                if(city[i].id==city_id){
                  output =output+'<option value="'+city[i].id+'"selected>'+city[i].cityname+'</option>';
                }
                else{
                  output =output+'<option value="'+city[i].id+'">'+city[i].cityname+'</option>';
                }
              }
            }
            $('#city').html(output);
            var pin =<?php echo json_encode($pincode); ?> ;
            var output = '<option value="">Select Zipcode </option>';
            for(var i=0;i<pin.length;i++)
            {
              
              if(pin[i].citycode==city_id)
              {
                if(Pincode==pin[i].id){

                output =output+'<option value="'+pin[i].id+'" selected>'+pin[i].pincode+'</option>';
                }
                else{
                output =output+'<option value="'+pin[i].id+'">'+pin[i].pincode+'</option>';

                }

              }
            }
            $('#pincode').html(output);


}
 window.onload=myFunction;
<?php } ?>
</script>
<script type="text/javascript">
  $(document).ready(function(){

$(".AddStaff").addClass("active");
});
</script>

<!--=========================================================================================================================-->
<?php $this->load->view('common/footer'); ?>