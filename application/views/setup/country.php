<?php $this->load->view('common/header'); ?>
<!--================================================================================================================================-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Country</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Country List</li>
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
                  <i class="nav-icon fas fa-plus"></i> Add Country</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Country Name</th>
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
                  		<td><?php echo $record->countryname; ?></td>
                      <?php if($record->status=='Y'){ ?>
                      <td><i class="fa fa-check" style="color:green"></i></td>
                      <?php }else{ ?>
                      <td><i class="fa fa-times" style="color:red"></i></td>
                      <?php } ?>
                      <td><?php echo "$record->stampdate"; ?></td>
                      <td><?php echo "$record->stampusername"; ?></td>
                  		<td> 
                        <i type="button" class="fas fa-edit editfrom" data-status='<?php echo $record->status; ?>' data-countryname='<?php echo $record->countryname; ?>' data-id='<?php echo $record->id; ?>'   style="font-size: 25px;color: #1c8ceb;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  			<a href="<?php echo site_url('Setup/deleteCountry/').$record->id; ?>".><i class="fas fa-trash-alt" style="font-size: 25px;color: red;"></i></a>
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
                  <div class="card-header bg-primary titleadd">Add Country</div>
                  <div class="card-header bg-primary titleupdate" style="display: none">Update Country</div>
                  <div class="card-body">
                    <input type="text" name="id" id="id" hidden>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputName1">Country Name</label>
                          <input type="text" class="form-control" id="countryname" name="countryname"  placeholder="Enter Name" required>
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
                      <button  class="btn btn-danger" data-dismiss="modal">Close</button>
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


$(".Country").addClass("active");
// State
// transform: rotate(-90deg);

$('#add').click(function(e){
        $('.add').show();
        $('.titleadd').show();
        $(".update").hide();
        $(".titleupdate").hide();
        $("form")[0].reset();
});  

  $('#upload_form').on('submit', function(e){  
      $('#modal-default').modal('hide');
      $('#demo').show();
      var id=$("#id").val();
      var countryname=$("#countryname").val();
      var status=$("#status").val();

      if(id==''){
        // alert("insert");
        e.preventDefault();
        $("form")[0].reset();
        $.ajax({  
          url:"<?php echo base_url(); ?>Setup/insertCountry",   
          type: 'post',
          data: {countryname:countryname,status:status},  
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
          url:"<?php echo base_url(); ?>Setup/updateCountry",   
          type: 'post',
          data: {id:id,countryname:countryname,status:status},  
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
        var countryname = $(this).data('countryname');
        var status= $(this).data('status');
        $("#id").val(id);
        $("#countryname").val(countryname);
        $("#status").val(status);
        $(".add").hide();
        $(".titleadd").hide();
        $('.titleupdate').show();
        $('.update').show();
        $('#modal-default').modal('show');
      

  });
      

 });  
 </script> 

<?php $this->load->view('common/footer'); ?>
