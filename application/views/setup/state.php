<?php $this->load->view('common/header'); ?>
<!--================================================================================================================================-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>State</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">State List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->             
    <div class="loading" id="demo" style="display: none;">Loading&#8230;</div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <button class="btn btn-primary btn-md " id="add" data-toggle="modal" data-target="#modal-default">
                  <i class="nav-icon fas fa-plus"></i> Add State</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Country Name</th>
                    <th>State Name</th>
                    <th>Status</th>
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
                  		<td><?php echo"$record->id"?></td>
                          <?php 
                          foreach ($countries as $country) {
                            if($country->id==$record->countrycode){
                              $countryname=$country->countryname;
                            }
                          }
                          ?>
                      <td><?php echo "$countryname"; ?></td>
                      <td><?php echo "$record->statename"; ?></td>                          
                      <?php if($record->status=='Y'){ ?>
                      <td><i class="fa fa-check" style="color:green"></i></td>
                      <?php }else{ ?>
                      <td><i class="fa fa-times" style="color:red"></i></td>
                      <?php } ?>
                      <td><?php echo "$record->stampdate"; ?></td>
                      <td><?php echo "$record->stampusername"; ?></td>
                  		<td> 
                        <i type="button" class="fas fa-edit editfrom" data-countrycode='<?php echo $record->countrycode; ?>' data-status='<?php echo $record->status; ?>' data-statename='<?php echo $record->statename; ?>' data-id='<?php echo $record->id; ?>'   style="font-size: 25px;color: #1c8ceb;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  			<a href="<?php echo site_url('Setup/deleteState/').$record->id; ?>".><i class="fas fa-trash-alt" style="font-size: 25px;color: red;"></i></a>
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
            			<div class="card-header bg-primary">Add State</div>
                  <div class="card-header bg-primary" style="display: none">Update State</div>
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
                          <label for="exampleInputName1">State Name</label>
                          <input type="text" class="form-control" id="statename" name="state name"  placeholder="Enter state" required>
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
// select 2 for dropdown
$("#country").select2();
$(".State").addClass("active");

$('#add').click(function(e){

         var countries =<?php echo json_encode($countries); ?> ;

        var output = '<option value="">Select Country</option>';
        for(var i=0;i<countries.length;i++)
        {
                      output =output+'<option value="'+countries[i].id+'">'+countries[i].countryname+'</option>';
        }
        document.getElementById("country").innerHTML =output;   
        $('.add').show();
        $(".update").hide();
        $("form")[0].reset();
});  

  $('#upload_form').on('submit', function(e){  
      $('#modal-default').modal('hide');
      $('#demo').show();
      var id=$("#id").val();
      var country=$("#country").val();
      var statename=$("#statename").val();
      var status=$("#status").val();

      if(id==''){
        // alert("insert");
        e.preventDefault();
        $("form")[0].reset();
        $.ajax({  
          url:"<?php echo base_url(); ?>Setup/insertState",   
          type: 'post',
          data: {country:country,statename:statename,status:status},  
          success:function(data)  
          {  

                window.location.href=data;
                $('#demo').hide();
          }  
        });  
      
      }
      else{
        // alert("a");
         e.preventDefault();
        $("form")[0].reset();
        $.ajax({  
          url:"<?php echo base_url(); ?>Setup/updateState",   
          type: 'post',
          data: {id:id,country:country,statename:statename,status:status},  
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
        // alert(country);
        var statename = $(this).data('statename');
        var status= $(this).data('status');
        $("#id").val(id);
        $("#statename").val(statename);
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

        $('#modal-default').modal('show');
      

  });
      

 });  
 </script> 

<?php $this->load->view('common/footer'); ?>
