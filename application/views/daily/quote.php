<?php 
if($this->session->userdata('role')=='S'){
$this->load->view('common/header');   
}
else
{
 $this->load->view('common/cheader');    
}
?>
<!--================================================================================================================================-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quote</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Quote List</li>
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
                <?php if($this->session->userdata('role')=='S'){?>
                <button class="btn btn-primary btn-md " id="add" data-toggle="modal" data-target="#modal-default">
                  <i class="nav-icon fas fa-plus"></i> Add Quote</button>
                <?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Quote</th>
                    <th>Author</th>
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
                  		<td><?php echo $record->quote; ?></td>
                      <td><?php echo $record->author; ?></td>
                      <td><?php echo "$record->stampdate"; ?></td>
                      <td><?php echo "$record->stampusername"; ?></td>
                  		<td> 
                        <span class="btn btn-info btn-sm">
                        <i class="fas fa-pencil-alt editfrom" data-quote='<?php echo $record->quote; ?>' data-author='<?php echo $record->author; ?>' data-id='<?php echo $record->id; ?>'> Edit </i>
                          </span>
<!--                         &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger btn-sm " href="<?php echo site_url('Setup/deleteSource/').$record->id; ?>".><i class="fas fa-trash" ></i> Delete</a> -->
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
            			<div class="card-header bg-primary titleadd">Add Quote</div>
                  <div class="card-header bg-primary titleupdate" style="display: none">Update Quote</div>
            			<div class="card-body">
            				<input type="text" name="id" id="id" hidden>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputName1">Quote *</label>
                          <input type="text" class="form-control" id="quote" name="quote"  placeholder="Enter Quote" required>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputName1">Author *</label>
                          <input type="text" class="form-control" id="author" name="author"  placeholder="Enter Author" required>
                        </div>
                      </div>
                    </div>
                  </div>
            			<div class="card-footer">
                      <?php if($this->session->userdata('role')=='S'){?>
			                <button  type="submit" name="upload" id="upload" class="btn btn-primary add" >Add</button>
                      <button  type="submit" name="upload" id="upload" class="btn btn-primary update" style="display: none">Update</button>
                    <?php } ?>
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
      toastr.error('  Successfully Quote Delete .  ')    
  <?php } ?>
  <?php if($this->session->flashdata('insert')){ ?>
    toastr.success(' Successfully Quote Add  ')
  <?php } ?>
  <?php if($this->session->flashdata('update')){ ?>
    toastr.success(' Successfully Quote Update ')
  <?php } ?>

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
      var quote=$("#quote").val();
      var author=$("#author").val();
      if(id==''){
        // alert("insert");
        e.preventDefault();
        $("form")[0].reset();
        $.ajax({  
          url:"<?php echo base_url(); ?>Daily/insertQuote",   
          type: 'post',
          data: {quote:quote,author:author},  
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
          url:"<?php echo base_url(); ?>Daily/updateQuote",   
          type: 'post',
          data: {id:id,quote:quote,author:author},  
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
        var author = $(this).data('author');
        var quote= $(this).data('quote');
        $("#id").val(id);
        $("#author").val(author);
        $("#quote").val(quote);
        $(".add").hide();
        $(".titleadd").hide();
        $('.titleupdate').show();
        $('.update').show();
        $('#modal-default').modal('show');
      

  });
      
$(".quote").addClass("active");
  
 });  
 </script> 

<?php $this->load->view('common/footer'); ?>
