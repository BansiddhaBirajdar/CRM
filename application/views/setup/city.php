<?php $this->load->view('common/header'); ?>
<!--================================================================================================================================-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>City</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">City List</li>
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
                <button class="btn btn-primary btn-md " id="add" data-toggle="modal" data-target="#modal-default">
                  <i class="nav-icon fas fa-plus"></i> Add City</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Country Name</th>
                    <th>State Name</th>
                    <th>City Name</th>
                    <th>Status</th>
                    <th>Stamp Date</th>
                    <th>StampUsername</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(isset($records)){
                      foreach($records as $record){

                          foreach ($countries as $country) {
                            if($country->id==$record->countrycode){
                              $countryname=$country->countryname;
                            }
                          }
                          foreach ($states as $state) {
                            if($state->id==$record->statecode){
                              $statename=$state->statename;
                            }
                          }

                          ?>
                        <tr>
                          <td><?php echo"$record->id"?></td>
                          <td><?php echo "$countryname"; ?></td>
                          <td><?php echo "$statename"; ?></td>
                          <td><?php echo"$record->cityname"?></td>
                          <?php if($record->status=='Y'){ ?>
                          <td><i class="fa fa-check" style="color:green"></i></td>
                          <?php }else{ ?>
                            <td><i class="fa fa-times" style="color:red"></i></td>
                          <?php } ?>
                          <td><?php echo "$record->stampdate"; ?></td> 
                          <td><?php echo "$record->stampusername"; ?></td>
                  		<td> 
                        <i type="button" class="fas fa-edit editfrom" data-cityname='<?php echo $record->cityname; ?>' data-countrycode='<?php echo $record->countrycode; ?>' data-status='<?php echo $record->status; ?>' data-statecode='<?php echo $record->statecode; ?>' data-id='<?php echo $record->id; ?>'   style="font-size: 25px;color: #1c8ceb;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  			<a href="<?php echo site_url('Setup/deleteCity/').$record->id; ?>".><i class="fas fa-trash-alt" style="font-size: 25px;color: red;"></i></a>
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

	<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 140%;">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Forgot password</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            	<div class="card card-primary">
            		<form role="form" method="post" id="upload_form"  enctype="multipart/form-data">
            			<div class="card-header bg-primary">Add City</div>
                  <div class="card-header bg-primary" style="display: none">Update City</div>
            			<div class="card-body">
            				<input type="text" name="id" id="id" hidden>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label class>Country Name <span class="required">*</span></label>
                          <select class="form-control select2bs4" id="country" name="countryid" required>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label class>State Name <span class="required">*</span></label>
                          <select class="form-control select2bs4" id="state" name="stateid" required>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputName1">State Name</label>
                          <input type="text" class="form-control" id="cityname" name="cityname"  placeholder="Enter City " required>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <label class>Status<span class="required">*</span></label>
                          <select class="form-control" id="status" name="status" required>
                            <option value="Y" selected>Active</option>
                            <option value="N" >In Active</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
            			<div class="card-footer">
			                <button  type="submit" name="upload" id="upload" class="btn btn-primary add" >Add</button>
                      <button  type="submit" name="upload" id="upload" class="btn btn-primary update" style="display: none">Update</button>
			                <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
			            </div>
            		</form>
            	</div>		
            	
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>	

<script>  
 $(document).ready(function(){  

  <?php if($this->session->flashdata('delete')){ ?>
      toastr.error('  Successfully Country Delete .  ')    
  <?php } ?>
  <?php if($this->session->flashdata('insert')){ ?>
    toastr.success(' Successfully Country Add  ')
  <?php } ?>
  <?php if($this->session->flashdata('update')){ ?>
    toastr.success(' Successfully Country Update ')
  <?php } ?>


$(".City").addClass("active");

// select 2 for dropdown
$("#country").select2();
$("#state").select2();


// 
$('#add').click(function(e){
        var countries =<?php echo json_encode($countries); ?> ;

        var output = '<option value="">Select Country</option>';
        for(var i=0;i<countries.length;i++)
        {
                      output =output+'<option value="'+countries[i].id+'">'+countries[i].countryname+'</option>';
        }
        document.getElementById("country").innerHTML =output;
         var output = '<option value="">Select State</option>';
        document.getElementById("state").innerHTML =output;
        $('.add').show();
        $(".update").hide();
        $("form")[0].reset();
});  
   // shorting state by using country id
$('#country').change(function(e){

        var country=$("#country").val();
        var states =<?php echo json_encode($states); ?> ;
        var output = '<option value="">Select State</option>';
        for(var i=0;i<states.length;i++)
        {
                    if(states[i].countrycode==country){
                            output =output+'<option value="'+states[i].id+'">'+states[i].statename+'</option>';
                      }
        }
        document.getElementById("state").innerHTML =output;
   
});  



  $('#upload_form').on('submit', function(e){  
      $('#modal-default').modal('hide');
      $('#demo').show();
      var id=$("#id").val();
      var country=$("#country").val();
      var state=$("#state").val();
      var cityname=$("#cityname").val();
      var status=$("#status").val();
      // alert(id);
      // alert(country);
      // alert(state);
      // alert(cityname);
      // alert(status);
      if(id==''){
        // alert("insert");
        e.preventDefault();
        $("form")[0].reset();
        $.ajax({  
          url:"<?php echo base_url(); ?>Setup/insertCity",   
          type: 'post',
          data: {country:country,state:state,cityname:cityname,status:status},  
          success:function(data)  
          {  

                window.location.href=data;
                $('#demo').hide();
          }  
        });  
      
      }
      else{
         e.preventDefault();
        $("form")[0].reset();
        $.ajax({  
          url:"<?php echo base_url(); ?>Setup/updateCity",   
          type: 'post',
          data: {id:id,country:country,state:state,cityname:cityname,status:status},  
          success:function(data)  
          {  
              // alert(data);
                window.location.href=data;
                $('#demo').hide();
          }  
        });

      }

          
    }); 

    $('.editfrom').click(function(e){
        var id = $(this).data('id');
        var country = $(this).data('countrycode');
        var state = $(this).data('statecode');
        var city=$(this).data('cityname');
        var status= $(this).data('status');

        $("#id").val(id);
        $("#cityname").val(city);
        $("#status").val(status);
        $(".add").hide();
        $('.update').show();
        
        var countries =<?php echo json_encode($countries); ?> ;

        var output = '<option value="">Select Country</option>';
        for(var i=0;i<countries.length;i++)
        {
                  if(countries[i].id==country)
                  {
                    output =output+'<option value="'+countries[i].id+'"  selected>'+countries[i].countryname+'</option>';
                    }  
                  else{
                      output =output+'<option value="'+countries[i].id+'">'+countries[i].countryname+'</option>';
                  }

        }
        document.getElementById("country").innerHTML =output;
        var country=$("#country").val();
        var states =<?php echo json_encode($states); ?> ;
        var output = '<option value="">Select State</option>';
        for(var i=0;i<states.length;i++)
        {
                    if(states[i].countrycode==country){
                            if(states[i].id==state)
                            {
                                output =output+'<option value="'+states[i].id+'" selected>'+states[i].statename+'</option>';
                            
                            }else{
                                output =output+'<option value="'+states[i].id+'">'+states[i].statename+'</option>';
                                }
                    }
        }
        document.getElementById("state").innerHTML =output;

        $('#modal-default').modal('show');
      

  });
      

 });  
 </script> 

<?php $this->load->view('common/footer'); ?>
