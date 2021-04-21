<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Staff extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
				if(!$this->session->userdata('stampusername')){
				redirect('Login');
			}
			$this->load->model('FetchAllDataModel');
			$this->load->model('InsertDataModel');
			$this->load->model('UpdateDataByIdModel');
			$this->load->model('GetByIdAllDataModel');
			$this->load->model('DeleteDataByIdModel');
			$this->apiurl=$this->config->item('url');
		
		}
		public function index(){
		
		}
		public function manageStaff(){
			$url=$this->apiurl."department/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			// $url=$this->apiurl."usermaster/fetch";
			$url=$this->apiurl."staffmaster/fetch";
			$resopne2=$this->FetchAllDataModel->FetchAllData($url);
			// countrymaster
			$url=$this->apiurl."countrymaster/fetch";
			$resopne3=$this->FetchAllDataModel->FetchAllData($url);
			// state fetching
			$url=$this->apiurl."statemaster/fetch";
			$resopne4=$this->FetchAllDataModel->FetchAllData($url);
			// city fetching
			$url=$this->apiurl."citymaster/fetch";
			$resopne5=$this->FetchAllDataModel->FetchAllData($url);
			// Pinocode fetching
			$url=$this->apiurl."pincodemaster/fetch";
			$resopne6=$this->FetchAllDataModel->FetchAllData($url);
			//department 
			$url=$this->apiurl."loginmaster/fetch";
			$resopne7=$this->FetchAllDataModel->FetchAllData($url);

			if($resopne1[1]!=200 && $resopne2[1]!=200 && $resopne3[0]!=200 && $resopne4[0]!=200 && $resopne5[0]!=200 && $resopne6[0]!=200 && $resopne7[0]!=200){
				warning();
			}
			$data['countries']=json_decode($resopne3[0]);
			$data['states']=json_decode($resopne4[0]);
			$data['cities']=json_decode($resopne5[0]);
			$data['pincode']=json_decode($resopne6[0]);
			$data['depts']=json_decode($resopne1[0]);
			$data['records']=json_decode($resopne2[0]);
			$data['login']=json_decode($resopne7[0]);

			// print_r($data);
			// echo $_SERVER['REMOTE_ADDR'];
			$this->load->view('staff/manageStaff',$data);	
		}
		public function addStaff(){
			// countrymaster
			$url=$this->apiurl."countrymaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			// state fetching
			$url=$this->apiurl."statemaster/fetch";
			$resopne2=$this->FetchAllDataModel->FetchAllData($url);
			// city fetching
			$url=$this->apiurl."citymaster/fetch";
			$resopne3=$this->FetchAllDataModel->FetchAllData($url);
			// Pinocode fetching
			$url=$this->apiurl."pincodemaster/fetch";
			$resopne4=$this->FetchAllDataModel->FetchAllData($url);
			//department 
			$url=$this->apiurl."department/fetch";
			$resopne5=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200 && $resopne2[1]!=200 && $resopne3[1]!=200 && $resopne4[1]!=200 && $resopne5[1]!=200)
			{
				warning();
			}
			$data['countries']=json_decode($resopne1[0]);
			$data['states']=json_decode($resopne2[0]);
			$data['cities']=json_decode($resopne3[0]);
			$data['pincode']=json_decode($resopne4[0]);
			$data['depts']=json_decode($resopne5[0]);
			// print_r($data);
			$this->load->view('staff/insertandupdatestaff',$data);

			
		}
		public function insertDataStaff(){
					$photo='';
					$photo  = $_FILES['photo']['name'];
					$temp = explode(".", $_FILES["photo"]["name"]);
					$photo = round(date('dmYhis')) . '.' . end($temp);	
                
                  move_uploaded_file($_FILES["photo"]["tmp_name"],'./images/staff/'.$photo);
	                
				$data=array(
					'name'=>$this->input->post('name'),
					'mobileno'=>$this->input->post('mobileno'),
					'street'=>$this->input->post('street'),
					'countryid'=>$this->input->post('countryid'),
					'stateid'=>$this->input->post('stateid'),
					'cityid'=>$this->input->post('cityid'),
					'pincode'=>$this->input->post('pincode'),
					'image'=>$photo,
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password'),
					'status'=>$this->input->post('status'),
					'depid'=>$this->input->post('department'),
					'role'=>'S',
					'lastlogin'=>date("l/d/F/Y h:i:s a"),
					);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');

			$url=$this->apiurl."staffmaster/add";
			$respone=$this->InsertDataModel->InsertDataDepartment($url,$data);
			if($respone[1]==200){
						$this->session->set_flashdata('success','Data successfully Add ');
						redirect(base_url('staff/manageStaff'));
              }
              else{
                    warning();
              }


		}
		
		public function getByIdDataStaff($id){
			// countrymaster
			$url=$this->apiurl."countrymaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			// state fetching
			$url=$this->apiurl."statemaster/fetch";
			$resopne2=$this->FetchAllDataModel->FetchAllData($url);
			// city fetching
			$url=$this->apiurl."citymaster/fetch";
			$resopne3=$this->FetchAllDataModel->FetchAllData($url);
			// Pinocode fetching
			$url=$this->apiurl."pincodemaster/fetch";
			$resopne4=$this->FetchAllDataModel->FetchAllData($url);
			//department 
			$url=$this->apiurl."department/fetch";
			$resopne5=$this->FetchAllDataModel->FetchAllData($url);
			//staffmaster? 
			$url=$this->apiurl."staffmaster/getdetail/".$id;
			$resopne6=$this->FetchAllDataModel->FetchAllData($url);
			//loginmaster 
			$url=$this->apiurl."loginmaster/getdetail/".$id;
			$resopne7=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200 && $resopne2[1]!=200 && $resopne3[1]!=200 && $resopne4[1]!=200 && $resopne5[1]!=200)
			{
				warning();
			}
			// $data['countries']=json_decode($resopne1[0]);
			// $data['states']=json_decode($resopne2[0]);
			// $data['cities']=json_decode($resopne3[0]);
			// $data['pincode']=json_decode($resopne4[0]);
			// $data['depts']=json_decode($resopne5[0]);
			$data['record']=json_decode($resopne6[0]);
			// $data['login']=json_decode($resopne7[0]);
			print_r($data);
			echo $id;

			// $this->load->view('staff/insertandupdatestaff',$data);

		}
		public function UpdateDataStaff($id){
					// //staffmaster? 
			$url=$this->apiurl."staffmaster/getdetail/".$id;
			$respone=$this->FetchAllDataModel->FetchAllData($url);
			if($respone[1]!=200)
				{
					warning();
				} 
				$records=json_decode($respone[0]);
				if($_FILES['photo']['name'] == ''){
   				$photo=$records->image;
   				}
   				else{

   					$photo=$_FILES['photo']['name'];
   					$temp = explode(".", $_FILES["photo"]["name"]);
					$photo = round(date('dmYhis')) . '.' . end($temp);
					move_uploaded_file($_FILES["photo"]["tmp_name"],'./images/staff/'.$photo);	 
	                
	                unlink('./images/staff/'.$records->image);

   				}
				$data=array(
					'id'=>$id,
					'name'=>$this->input->post('name'),
					'mobileno'=>$this->input->post('mobileno'),
					'street'=>$this->input->post('street'),
					'countryid'=>$this->input->post('countryid'),
					'stateid'=>$this->input->post('stateid'),
					'cityid'=>$this->input->post('cityid'),
					'pincode'=>$this->input->post('pincode'),
					'image'=>$photo,
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password'),
					'status'=>$this->input->post('status'),
					'depid'=>$this->input->post('department'),
					'role'=>'S',
					'lastlogin'=>date("l/d/F/Y h:i:s a"),
					);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');

			$url=$this->apiurl."staffmaster/updated";
			$respone=$this->InsertDataModel->InsertDataDepartment($url,$data);
			if($respone[1]==200){
						$this->session->set_flashdata('success','Data successfully Add ');
						redirect(base_url('staff/manageStaff'));
              }
              else{
                    warning();
              }

		}
		
		/*************************************************************************************/
		public function manageDepartment(){
			
			$url=$this->apiurl."department/fetch";
			$resopne=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne[1]!=200){
				warning();
			}

			$data['records']=json_decode($resopne[0]);
			// print_r($data);
			// exit();
			$this->load->view('staff/manageDepartment',$data);
		}
		/*************************************************************************************/
		// public function addDepartment(){
		// 	$this->load->view('staff/addandupdateDepartment');
		// }
		public function insertandupdatestaff(){
			$this->load->view('staff/insertandupdatestaff');	
		}
		public function insertDataDepartment(){
			$data=array(
				'dname'=>$this->input->post('deptname'),
				// 'leads'=>$this->input->post('leads'),
				// 'sales'=>$this->input->post('sales'),
				// 'customers'=>$this->input->post('customers'),
				// 'projects'=>$this->input->post('projects'),
				// 'tasks'=>$this->input->post('tasks')
			);
			$url=$this->apiurl."department/add";
			$resopne=$this->InsertDataModel->InsertDataDepartment($url,$data);
			
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','Insert Department');
			echo(base_url('Staff/manageDepartment')); 

		
		}
		public function getByIdDataDepartment(){
			$id=$this->input->post('id');

			$url=$this->apiurl."department/getdetail/".$id;
			$resopne=$this->GetByIdAllDataModel->GetByIdAllDataDepartment($url);
			if($resopne[1]!=200){
				warning();
			}

			echo $resopne[0];
			
		}
		public function UpdateDataDepartment(){
			$data=array(
				'id'=>$this->input->post('id'),
				'dname'=>$this->input->post('deptname'),
				// 'leads'=>$this->input->post('leads'),
				// 'sales'=>$this->input->post('sales'),
				// 'customers'=>$this->input->post('customers'),
				// 'projects'=>$this->input->post('projects'),
				// 'tasks'=>$this->input->post('tasks')
			);

			$url=$this->apiurl."department/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataByIdDepartment($url,$data);
			
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','Update Department');
			echo(base_url('Staff/manageDepartment'));

		}
		public function DeleteDataDepartment($id){
			$url=$this->apiurl."department/delete/".$id;
			$resopne=$this->DeleteDataByIdModel->DeleteDataByIdDepartment($url);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('delete','delete Department');
			redirect(base_url('Staff/manageDepartment'));
		}
	}
?>
