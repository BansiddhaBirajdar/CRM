<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Leads extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
					if(!$this->session->userdata('stampusername')){
				redirect('Login');
			}
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('FetchAllDataModel');
			$this->load->model('InsertDataModel');
			$this->load->model('UpdateDataByIdModel');
			$this->load->model('GetByIdAllDataModel');
			$this->load->model('DeleteDataByIdModel');
			$this->apiurl=$this->config->item('url');
		
		}
		public function addLeads(){
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
			//source 
			$url=$this->apiurl."sourcemaster/fetch";
			$resopne6=$this->FetchAllDataModel->FetchAllData($url);
			//source 
			$url=$this->apiurl."staffmaster/fetch";
			$resopne7=$this->FetchAllDataModel->FetchAllData($url);

			if($resopne1[1]!=200 && $resopne2[1]!=200 && $resopne3[1]!=200 && $resopne4[1]!=200 && $resopne5[1]!=200 && $resopne6[1]!=200 && $resopne7[1]!=200)
			{
				warning();
			}
			$data['countries']=json_decode($resopne1[0]);
			$data['states']=json_decode($resopne2[0]);
			$data['cities']=json_decode($resopne3[0]);
			$data['pincode']=json_decode($resopne4[0]);
			$data['depts']=json_decode($resopne5[0]);
			$data['source']=json_decode($resopne6[0]);
			$data['staff']=json_decode($resopne7[0]);
			// print_r($data);
			$this->load->view('leads/insertandupdateleads',$data);

			
		}

	}
?>