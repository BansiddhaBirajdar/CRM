<?php $this->load->view('common/header'); ?>
<!--================================================================================================================================-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Source</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Source List</li>
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
                  <i class="nav-icon fas fa-plus"></i> Add Source</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Source Name</th>
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
                      <td><?php echo $record->sourcename; ?></td>
                      <?php if($record->status=='Y'){ ?>
                      <td><i class="fa fa-check" style="color:green"></i></td>
                      <?php }else{ ?>
                      <td><i class="fa fa-times" style="color:red"></i></td>
                      <?php } ?>
                      <td><?php echo "$record->stampdate"; ?></td>
                      <td><?php echo "$record->stampusername"; ?></td>
                      <td> 
                        <span class="btn btn-info btn-sm">
                        <i class="fas fa-pencil-alt editfrom" data-status='<?php echo $record->status; ?>' data-sourcename='<?php echo $record->sourcename; ?>' data-id='<?php echo $record->id; ?>'> Edit</i>
                          </span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger btn-sm " href="<?php echo site_url('Setup/deleteSource/').$record->id; ?>".><i class="fas fa-trash" ></i> Delete</a>
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
                  <div class="card-header bg-primary titleadd">Add Source</div>
                  <div class="card-header bg-primary titleupdate" style="display: none">Update Source</div>
                  <div class="card-body">
                    <input type="text" name="id" id="id" hidden>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputName1">Source Name</label>
                          <input type="text" class="form-control" id="sourcename" name="sourcename"  placeholder="Enter Source" required>
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
      toastr.error('  Successfully Source Delete .  ')    
  <?php } ?>
  <?php if($this->session->flashdata('insert')){ ?>
    toastr.success(' Successfully Source Add  ')
  <?php } ?>
  <?php if($this->session->flashdata('update')){ ?>
    toastr.success(' Successfully Source Update ')
  <?php } ?>


$(".Source").addClass("active");
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
      var sourcename=$("#sourcename").val();
      var status=$("#status").val();

      if(id=='')
      {
        e.preventDefault();
        $("form")[0].reset();
        $.ajax({  
          url:"<?php echo base_url(); ?>Setup/insertSource",   
          type: 'post',
          data: {sourcename:sourcename,status:status},  
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
          url:"<?php echo base_url(); ?>Setup/updateSource",   
          type: 'post',
          data: {id:id,sourcename:sourcename,status:status},  
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
        var sourcename = $(this).data('sourcename');
        var status= $(this).data('status');
        $("#id").val(id);
        $("#sourcename").val(sourcename);
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
