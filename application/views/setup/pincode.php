<?php $this->load->view('common/header'); ?>
<!--================================================================================================================================-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pincode</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">PincodeList</li>
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
                  <i class="nav-icon fas fa-plus"></i> Add Pincode</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <th>Status</th>
                    <th>Stamp Date</th>
                    <th>StampUsername</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(isset($records)){
                        foreach($records as $record) { 
                            foreach ($citys as $city) {
                            if($city->id==$record->citycode){
                              $cityname=$city->cityname;
                            }
                          }
                          ?>
                        <tr>
                          <td><?php echo"$record->id"?></td>
                          <td><?php echo "$cityname"; ?></td>
                          <td><?php echo "$record->pincode"; ?></td>
                          <?php if($record->status=='Y'){ ?>
                          <td><i class="fa fa-check" style="color:green"></i></td>
                          <?php }else{ ?>
                            <td><i class="fa fa-times" style="color:red"></i></td>
                          <?php } ?>
                          <td><?php echo "$record->stampdate"; ?></td>
                          <td><?php echo "$record->stampusername"; ?></td>
                  		<td> 
                        <i type="button" class="fas fa-edit editfrom" data-city='<?php echo $record->citycode; ?>' data-status='<?php echo $record->status; ?>' data-pincode='<?php echo $record->pincode; ?>' data-id='<?php echo $record->id; ?>'   style="font-size: 25px;color: #1c8ceb;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  			<a href="<?php echo site_url('Setup/deleteState/').$record->id; ?>".><i class="fas fa-trash-alt" style="font-size: 25px;color: red;"></i></a>
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
            			<div class="card-header bg-primary titleadd">Add Pincode</div>
                  <div class="card-header bg-primary titleupdate" style="display: none">Update Pincode</div>
            			<div class="card-body">
            				<input type="text" name="id" id="id" hidden>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label class>City Name <span class="required">*</span></label>
                          <select class="form-control select2bs4" id="city" name="city" required>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputName1">Pincode Name</label>
                          <input type="text" class="form-control" id="pincode" name="pincode"  placeholder="Enter Pincode" required>
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
      toastr.error('  Successfully Pincode Delete .  ')    
  <?php } ?>
  <?php if($this->session->flashdata('insert')){ ?>
    toastr.success(' Successfully Pincode Add  ')
  <?php } ?>
  <?php if($this->session->flashdata('update')){ ?>
    toastr.success(' Successfully Pincode Update ')
  <?php } ?>
  $(".Pincode").addClass("active");
  $("#city").select2();

$('#add').click(function(e){
        var citys =<?php echo json_encode($citys); ?> ;

        var output = '<option value="">Select City</option>';
        for(var i=0;i<citys.length;i++)
        {
                      output =output+'<option value="'+citys[i].id+'">'+citys[i].cityname+'</option>';
        }
        document.getElementById("city").innerHTML =output;
        $('.add').show();
        $(".update").hide();
        $("form")[0].reset();
});  

  $('#upload_form').on('submit', function(e){  
      $('#modal-default').modal('hide');
       $('#demo').show();
      var id=$("#id").val();
      var city=$("#city").val();
      var pincode=$("#pincode").val();
      var status=$("#status").val();

      if(id==''){
        // alert("insert");
        e.preventDefault();
        $("form")[0].reset();
        $.ajax({  
          url:"<?php echo base_url(); ?>Setup/insertPincode",   
          type: 'post',
          data: {city:city,pincode:pincode,status:status},  
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
          url:"<?php echo base_url(); ?>Setup/updatePincode",   
          type: 'post',
          data: {id:id,city:city,pincode:pincode,status:status},  
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
        var city = $(this).data('city');
        var pincode = $(this).data('pincode');
        var status= $(this).data('status');

        $("#id").val(id);
        // $("#city").val(city);
        var citys =<?php echo json_encode($citys); ?> ;

        var output = '<option value="">Select City</option>';
        for(var i=0;i<citys.length;i++)
        {
                      if (citys[i].id==city){
                      output =output+'<option value="'+citys[i].id+'" selected>'+citys[i].cityname+'</option>';
                      }
                      else{

                      output =output+'<option value="'+citys[i].id+'">'+citys[i].cityname+'</option>';
                      }
        }
        document.getElementById("city").innerHTML =output;
        $("#pincode").val(pincode);
        $("#status").val(status);
        $(".add").hide();
        $('.update').show();
        $('#modal-default').modal('show');
      

  });
      

 });  
 </script> 

<?php $this->load->view('common/footer'); ?>
