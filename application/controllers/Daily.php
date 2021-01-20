<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Daily extends CI_Controller
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
		// *************************************************************************Notice code Start*********************************************************//
		public function noticeList()
		{
			// fetch the data
			$url=$this->apiurl."noticemaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$this->load->view('daily/notice',$data);	
		}
		public function insertNotice(){
			$data=array(

				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
			);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');

			$url=$this->apiurl."noticemaster/add";
			$resopne=$this->InsertDataModel->InsertData($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','insert');
			echo(base_url('Daily/noticeList')); 
		}

		public function updateNotice(){
			$data=array(
				'id'=>$this->input->post('id'),
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
			);
			$url=$this->apiurl."noticemaster/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataById($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','updateed');
			echo(base_url('Daily/noticeList')); 
		}
		// public function deleteCountry($id){
		// 	$url=$this->apiurl."countrymaster/delete/".$id;
		// 	$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
		// 	if($resopne[1]!=200){
		// 		warning();
		// 	}
		// 	$this->session->set_flashdata('delete','delete Department');
		// 	redirect(base_url('Setup/countryList'));

		
		// *************************************************************************notice code end*********************************************************//
		// **************************************************************************Quote code Start*********************************************************//
		public function quoteList()
		{
			// fetch the data
			$url=$this->apiurl."quotemaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$this->load->view('daily/quote',$data);	
		}
		public function insertQuote(){
			$data=array(

				'quote'=>$this->input->post('quote'),
				'author'=>$this->input->post('author'),
			);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');

			$url=$this->apiurl."quotemaster/add";
			$resopne=$this->InsertDataModel->InsertData($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','insert');
			echo(base_url('Daily/quoteList')); 
		}

		public function updateQuote(){
			$data=array(
				'id'=>$this->input->post('id'),
				'quote'=>$this->input->post('quote'),
				'author'=>$this->input->post('author'),
			);
			$url=$this->apiurl."quotemaster/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataById($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','updateed');
			echo(base_url('Daily/quoteList')); 
		}
		// public function deleteCountry($id){
		// 	$url=$this->apiurl."countrymaster/delete/".$id;
		// 	$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
		// 	if($resopne[1]!=200){
		// 		warning();
		// 	}
		// 	$this->session->set_flashdata('delete','delete Department');
		// 	redirect(base_url('Setup/countryList'));

		}
		// *************************************************************************Country code end*********************************************************//



	
?>