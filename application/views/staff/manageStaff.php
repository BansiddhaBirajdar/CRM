<?php $this->load->view('common/header'); ?>

<!--================================================================================================================================-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Manage Staff</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
      <div class="card card-solid">
        <div class="card-header text-muted border-bottom-0">
             <a href="<?php echo site_url('Staff/addStaff')?>"><button class="btn btn-primary btn-md ">
                  <i class="nav-icon fa fa-user-plus"></i> ADD Staff</button></a>
        </div>
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <?php 
            if(isset($records) && isset($depts)){
              foreach ($records as $record) {
               foreach ($depts as $dept) {
                 if($record->depid==$dept->id){
                  $dname=$dept->dname;
                 }
               }
               foreach ($countries as $dept) {
                 if($record->countryid==$dept->id){
                  $countryname=$dept->countryname;
                 }
               }
               foreach ($states as $dept) {
                 if($record->stateid==$dept->id){
                  $statename=$dept->statename;
                 }
               }
               foreach ($cities as $dept) {
                 if($record->cityid==$dept->id){
                  $cityname=$dept->cityname;
                 }
               }
               foreach($pincode as $dept) {
                 if($record->pincode==$dept->id){
                  $pin=$dept->pincode;
                 }
               }
               foreach ($login as $dept) {
                 if($record->id==$dept->staffid){
                  $gmail=$dept->email;
                  $status=$dept->status;
                 }
               }
              
            ?>

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo strtoupper($record->name) ;?></b></h2>
                      <p class="text-muted text-sm"><b>About: </b> <?php echo strtoupper($dname) ;?> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small" style="margin-top: 5px;"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?php echo strtoupper($countryname." ".$statename." ".$cityname." ".$record->street." ".$pin);?></li>
                        <li class="small" style="margin-top: 5px;"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email :<?php echo $gmail ;?> </li>
                        <li class="small" style="margin-top: 5px;"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $record->mobileno ;?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?php echo base_url();?>images/staff/<?php echo $record->image; ?>" alt="" class="img-circle img-fluid" style="width:123px;height: 146px;">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                      <?php if($status=='Y'){?>
                    <button class="btn btn-sm bg-teal">
                    	<i class="fas fa-check-circle"> Active </i>
                    </button>
                    <?php }else{ ?>
                      <button class="btn btn-sm bg-warning">
                      <i class="far fa-times-circle"> Not Active </i>
                      </button>
                    <?php }?>
                    <a href="<?php echo site_url('Staff/getByIdDataStaff/').$record->id; ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Edit Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php }} ?>
         
          </div>
        </div>
        
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

	

<!-- <script type="text/javascript">
	function mobile(){
		var x=document.getElementById("mobileno").value
		// alert(number);
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
	}
</script>
 -->
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
