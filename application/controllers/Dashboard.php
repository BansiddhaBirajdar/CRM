<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Dashboard extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			// if(!$this->session->userdata('stampusername')){
			// 	redirect('Login');
			// }
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('FetchAllDataModel');
			$this->load->model('InsertDataModel');
			$this->load->model('UpdateDataByIdModel');
			$this->load->model('GetByIdAllDataModel');
			$this->load->model('DeleteDataByIdModel');
			$this->apiurl=$this->config->item('url');
		
		
		}
		public function index(){
			$url=$this->apiurl."customermaster/CountCustomer";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			$url=$this->apiurl."ticketsmaster/ttotalcount";
			$resopne2=$this->FetchAllDataModel->FetchAllData($url);
			
			$url=$this->apiurl."customermaster/ctotalcount";
			$resopne3=$this->FetchAllDataModel->FetchAllData($url);
			$url=$this->apiurl."/leadsmaster/ltotalcount";
			$resopne4=$this->FetchAllDataModel->FetchAllData($url);
			$url=$this->apiurl."/staffmaster/stotalcount";
			$resopne5=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['data']=$resopne1[0];
			$data['tcount']=json_decode($resopne2[0]);
			$data['ccount']=json_decode($resopne3[0]);
			$data['lcount']=json_decode($resopne4[0]);
			$data['scount']=json_decode($resopne5[0]);
			// print_r($data);
			// exit();
			$this->load->view('dashboard',$data);
		}
		public function dashboardcustomer()
		{
			$this->load->view('cdashboard');	
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('Login'));
		}
	}
?>
