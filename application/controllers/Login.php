<?php
	class Login extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			$this->load->model('LoginModel');
			$this->load->model('FetchAllDataModel');
			$this->load->model('InsertDataModel');
			$this->load->model('UpdateDataByIdModel');
			$this->load->model('GetByIdAllDataModel');
			$this->load->model('DeleteDataByIdModel');
			$this->apiurl=$this->config->item('url');
		}

		public function index(){
			$this->load->view('login');
		}

		public function verify(){
			$check=$this->LoginModel->validate();

			if($check[1]!=200){
				warning();
			}

			$response=json_decode($check[0]);
			// print_r($check);
			// exit();
			if(isset($response)){
				$role=$response->role;
				if($response->status=='N')
				{
					$this->session->set_flashdata('warning','Username is not Active');
					redirect('Login');
				}

				if($role=='S'){
					$id=$response->staffid;

					$url=$this->apiurl."staffmaster/getdetail/".$id;
					$resopne1=$this->FetchAllDataModel->FetchAllData($url);
					echo "staff";
					
					if($resopne1[1]!=200)
					{
						warning();
					}				
					$data=json_decode($resopne1[0]);
					$session_data = array(
				 					'stampusername'=>$data->name,
				 					'stampuserid'=>$data->id,
				 					'profile'=>$data->image,
				 					'lastlogin'=>$response->lastlogin,
				 					'role'=>$response->role
				 				);
					print_r($session_data);
					$this->session->set_userdata($session_data);
					redirect('Dashboard');

				}
				else
				{
					echo "customermaster";
					$id=$response->staffid;
					$url=$this->apiurl."customermaster/getdetail/".$id;
					$resopne2=$this->FetchAllDataModel->FetchAllData($url);
					echo "cust";
					if($resopne2[1]!=200)
					{
						warning();
					}
					$data=json_decode($resopne2[0]);
					$session_data = array(
				 					'stampusername'=>$data->name,
				 					'stampuserid'=>$data->id,
				 					'profile'=>$data->image,
				 					'lastlogin'=>$response->lastlogin,
				 					'role'=>$response->role
				 				);
					print_r($session_data);
					$this->session->set_userdata($session_data);
					redirect('Dashboard/dashboardcustomer');
				}

			}
			 else{
				$this->session->set_flashdata('warning','Please Check your Email and Password?');
				redirect('Login');
			}	

			 // if(isset($response)){
				
			 // }
			
			
		}
	}
?>