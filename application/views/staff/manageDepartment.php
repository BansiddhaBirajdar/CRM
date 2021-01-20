<?php $this->load->view('common/header'); ?>
<!--================================================================================================================================-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Manag eDepartment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <button class="btn btn-primary btn-md " data-toggle="modal" data-target="#modal-default">
                  <i class="nav-icon fas fa-plus"></i> ADD Department</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Department Name</th>
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
                  		<td><?php echo $record->dname; ?></td>
                  		<td> 
                        <!-- data-toggle="modal" data-target="#modal-edit" -->
                            <i type="button" class="fas fa-edit editfrom" data-id='<?php echo $record->id; ?>'   style="font-size: 25px;color: #1c8ceb;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  			<a href="<?php echo site_url('Staff/DeleteDataDepartment/').$record->id; ?>".><i class="fas fa-trash-alt" style="font-size: 25px;color: red;"></i></a>
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
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Forgot password</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            	<div class="card card-primary">
            		<form role="form" method="post" id="upload_form"  enctype="multipart/form-data">
            			<div class="card-header bg-primary">Add Department</div>
            			<div class="card-body">
            				<div class="input-group mb-3">
          						<input type="text" name="deptname" id="deptname" class="form-control" placeholder="Department Name">
        					</div>
<!--         					<div class="form-group clearfix">
		                      <div class="icheck-primary">
		                        <input type="checkbox" name="leads" id="leads">
		                        <label for="checkboxPrimary1" style="margin-left: 10px;">
		                        	Leads
		                        </label>
		                      </div>
		                      <div class="icheck-primary">
		                        <input type="checkbox" name="customers" id="customers">
		                        <label for="checkboxPrimary2"  style="margin-left: 10px;">
		                        	Customers
		                        </label>
		                      </div>
		                      <div class="icheck-primary">
		                        <input type="checkbox"  name="sales" id="sales">
		                        <label for="checkboxPrimary3" style="margin-left: 10px;">
		                          Sales
		                        </label>
		                      </div>
		                      <div class="icheck-primary">
		                        <input type="checkbox" name="projects" id="projects">
		                        <label for="checkboxPrimar4" style="margin-left: 10px;">
		                          Projects
		                        </label>
		                      </div>
		                      <div class="icheck-primary">
		                        <input type="checkbox" name="tasks" id="tasks">
		                        <label for="checkboxPrimar5" style="margin-left: 10px;">
		                          Tasks
		                        </label>
		                      </div>
		                </div> -->
            			</div>
            			<div class="card-footer">
			                <button  type="submit" name="upload" id="upload" class="btn btn-primary" >Add</button>
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
            <form role="form" method="post" id="edit_form" enctype="multipart/form-data">
              <div class="card-header bg-primary">Edit Department</div>
              <div class="card-body">
              	<div class="row">
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="id" id="id" hidden>  
          			<input type="text" class="form-control" name="deptname" id="deptname1" placeholder="Department Name">
        		</div>
        		<div class="col-sm-6">
        			<!-- <div class="form-group clearfix">
                      <div class="icheck-primary">
                            <input type="checkbox" name="leads" id="leads1">
                            <label for="checkboxPrimary1" style="margin-left: 10px;">
                              Leads
                            </label>
                          </div>
                          <div class="icheck-primary">
                            <input type="checkbox" name="customers" id="customers1">
                            <label for="checkboxPrimary2"  style="margin-left: 10px;">
                              Customers
                            </label>
                          </div>
                          <div class="icheck-primary">
                            <input type="checkbox"  name="sales" id="sales1">
                            <label for="checkboxPrimary3" style="margin-left: 10px;">
                              Sales
                            </label>
                          </div>
                          <div class="icheck-primary">
                            <input type="checkbox" name="projects" id="projects1">
                            <label for="checkboxPrimar4" style="margin-left: 10px;">
                              Projects
                            </label>
                          </div>
                          <div class="icheck-primary">
                            <input type="checkbox" name="tasks" id="tasks1">
                            <label for="checkboxPrimar5" style="margin-left: 10px;">
                              Tasks
                            </label>
                          </div>
                  </div> -->
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
<script>  
 $(document).ready(function(){  

  <?php if($this->session->flashdata('delete')){ ?>
      toastr.error('  Successfully  Delete .  ')    
  <?php } ?>
  <?php if($this->session->flashdata('insert')){ ?>
    toastr.success(' Successfully Add  ')
  <?php } ?>
  <?php if($this->session->flashdata('update')){ ?>
    toastr.success(' Successfully Update ')
  <?php } ?>
  $(".Department").addClass("active");

      $('#upload_form').on('submit', function(e){  
      $('#modal-default').modal('hide');
      var deptname=$("#deptname").val()
      // var leads='N';
      // var sales='N';
      // var customers='N';
      // var projects='N';
      // var tasks='N';
      // var Leads=document.getElementById("leads");
      // var Sales=document.getElementById("sales");
      // var Customers=document.getElementById("customers");
      // var Projects=document.getElementById("projects");
      // var Tasks=document.getElementById("tasks");
      // if(Leads.checked == true){
      // var leads='Y';
      // }
      // if(Sales.checked == true){
      // var sales='Y';
      // }
      // if(Customers.checked == true){
      // var customers='Y';
      // }
      // if(Projects.checked == true){
      // var projects='Y';
      // }
      // if(Tasks.checked == true){
      // var tasks='Y';
      // }
      e.preventDefault();
      $("form")[0].reset();
      $.ajax({  
           url:"<?php echo base_url(); ?>Staff/insertDataDepartment",   
            type: 'post',
            data: {deptname:deptname},  
           success:function(data)  
           {  
                // alert(data);
                window.location.href=data;
           }  
      });  
          
      }); 

       $('.editfrom').click(function(e){
        var id = $(this).data('id');
         $("#id").val(id);
        // alert(id);
        $('#modal-edit').modal('show');
         $.ajax({  
           url:"<?php echo base_url(); ?>Staff/getByIdDataDepartment",
           type: 'post',
          data: {id: id},
           success:function(data)  
          {
              var a =JSON.parse(data);
              var dname=a.dname;
              // var leads=a.leads;
              // var sales=a.sales;
              // var customers=a.customers;
              // var projects=a.projects;
              // var tasks=a.tasks;

              // var Leads=document.getElementById("leads1");
              // var Sales=document.getElementById("sales1");
              // var Customers=document.getElementById("customers1");
              // var Projects=document.getElementById("projects1");
              // var Tasks=document.getElementById("tasks1");
              // alert(dname);
               $("#deptname1").val(dname);  
             //  if(leads=='Y'){
             //    Leads.checked = true;
             //  }

             //  if(sales=='Y'){
             //    Sales.checked = true;
             //  }

             //  if(customers=='Y'){
             //    Customers.checked = true;
             //  }

             //  if(projects=='Y'){
             //    Projects.checked = true;
             //  }

             // if(tasks=='Y'){
             //  Tasks.checked = true;
             //  }

           }  
      });

       });
       $('#edit_form').on('submit', function(e){  
      $('#modal-default').modal('hide');
      var deptname=$("#deptname1").val();
      var id=$("#id").val();
      // var leads='N';
      // var sales='N';
      // var customers='N';
      // var projects='N';
      // var tasks='N';

      // var Leads=document.getElementById("leads1");
      // var Sales=document.getElementById("sales1");
      // var Customers=document.getElementById("customers1");
      // var Projects=document.getElementById("projects1");
      // var Tasks=document.getElementById("tasks1");
      // if(Leads.checked == true){
      // var leads='Y';
      // }
      // if(Sales.checked == true){
      // var sales='Y';
      // }
      // if(Customers.checked == true){
      // var customers='Y';
      // }
      // if(Projects.checked == true){
      // var projects='Y';
      // }
      // if(Tasks.checked == true){
      // var tasks='Y';
      // }
      e.preventDefault();
      $("form")[0].reset();
      $.ajax({  
           url:"<?php echo base_url(); ?>Staff/UpdateDataDepartment",   
            type: 'post',
            data: {id:id,deptname:deptname},  
           success:function(data)  
           {  
                // alert(data);
                window.location.href=data;
           }  
      });  
          
      });

 });  
 </script> 

<?php $this->load->view('common/footer'); ?>