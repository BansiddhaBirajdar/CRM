<?php
	class Login extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			$this->load->model('LoginModel');
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
			
			 if(isset($response)){
			 	$session_data = array(
			 					'stampusername'=>"bansi",
			 					'stampuserid'=>$response->id,
			 					'profile'=>"vk.jpg",
			 					'lastlogin'=>$response->lastlogin,
			 	);
				$this->session->set_userdata($session_data);
				// print_r($response);
				// exit();
				redirect('Dashboard');
			 }
			 else{
				$this->session->set_flashdata('warning','Please Check your Email and Password?');
				redirect('Login');
			}	
			
			
		}
	}
?>