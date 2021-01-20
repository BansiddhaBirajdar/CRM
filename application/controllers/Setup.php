<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Setup extends CI_Controller
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


		public function productsList(){
			// fetch the data
			$url=$this->apiurl."productsmaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$this->load->view('setup/productlist',$data);	
		}
		public function productsaddfrom(){
			$this->load->view('setup/insertandupdatproduct');	
		}
		public function insertproducts(){
					$photo='';
					$photo  = $_FILES['photo']['name'];
					$temp = explode(".", $_FILES["photo"]["name"]);
					$photo = round(date('dmYhis')) . '.' . end($temp);	
                
                  move_uploaded_file($_FILES["photo"]["tmp_name"],'./images/product/'.$photo);

				$data=array(
					'productname'=>$this->input->post('productname'),
				    'productimage'=> $photo,
					'status'  => $this->input->post('status'),
				);
				$data['stampdate']=date('d-M-Y');
				$data['stamptime']=date('h:i:s a');
				$data['stampuserid']=$this->session->userdata('stampuserid');
				$data['stampusername']=$this->session->userdata('stampusername');
				$url=$this->apiurl."productsmaster/add";
				$resopne=$this->InsertDataModel->InsertData($url,$data);
				if($resopne[1]!=200){
					warning();
				}
				$this->session->set_flashdata('insert','insert');
				redirect(base_url('Setup/productsList'));

		}
		public function getdetailproduct($id){
			$url=$this->apiurl."productsmaster/getdetail/".$id;
			$respone=$this->FetchAllDataModel->FetchAllData($url);
			if($respone[1]!=200)
				{
					warning();
				} 
				$data['record']=json_decode($respone[0]);
					$this->load->view('setup/insertandupdatproduct',$data);
		}
		public function updateproducts($id){
			$url=$this->apiurl."productsmaster/getdetail/".$id;
			$respone=$this->FetchAllDataModel->FetchAllData($url);
			if($respone[1]!=200)
				{
					warning();
				} 
				$records=json_decode($respone[0]);
				if($_FILES['photo']['name'] == ''){
   				$photo=$records->productimage;
   				}
   				else{

   					$photo=$_FILES['photo']['name'];
   					$temp = explode(".", $_FILES["photo"]["name"]);
					$photo = round(date('dmYhis')) . '.' . end($temp);	 
                  move_uploaded_file($_FILES["photo"]["tmp_name"],'./images/product/'.$photo);
	                
	                unlink('./images/product/'.$records->productimage);

   				}
		
				$data=array(
					'id'=>$id,
					'productname'=>$this->input->post('productname'),
				    'productimage'=> $photo,
					'status'  => $this->input->post('status'),
				);
				$data['stampdate']=date('d-M-Y');
				$data['stamptime']=date('h:i:s a');
				$data['stampuserid']=$this->session->userdata('stampuserid');
				$data['stampusername']=$this->session->userdata('stampusername');
				$url=$this->apiurl."productsmaster/updated";
				$resopne=$this->InsertDataModel->InsertData($url,$data);
				if($resopne[1]!=200){
					warning();
				}
				$this->session->set_flashdata('insert','insert');
				redirect(base_url('Setup/productsList'));

		}
		public function deleteProduct($id){
			$url=$this->apiurl."productsmaster/getdetail/".$id;
			$respone=$this->FetchAllDataModel->FetchAllData($url);
			if($respone[1]!=200)
				{
					warning();
				} 
			$records=json_decode($respone[0]);
			unlink('./images/product/'.$records->productimage);

			$url=$this->apiurl."productsmaster/delete/".$id;
			$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('delete','delete Department');
			redirect(base_url('Setup/productsList'));

		}
		// *************************************************************************Country code start*********************************************************//
		public function countryList()
		{
			// fetch the data
			$url=$this->apiurl."countrymaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$this->load->view('setup/country',$data);	
		}
		public function insertCountry(){
			$data=array(
				'countryname'=>$this->input->post('countryname'),
				'status'  => $this->input->post('status'),
			);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			$url=$this->apiurl."countrymaster/add";
			$resopne=$this->InsertDataModel->InsertData($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','insert');
			echo(base_url('Setup/countryList')); 
		}

		public function updateCountry(){
			$data=array(
				'id'=>$this->input->post('id'),
				'countryname'=>$this->input->post('countryname'),
				'status'  => $this->input->post('status'),
			);
			// print_r($data);
			$url=$this->apiurl."countrymaster/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataById($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','updateed');
			echo(base_url('Setup/countryList')); 
		}
		public function deleteCountry($id){
			$url=$this->apiurl."countrymaster/delete/".$id;
			$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('delete','delete Department');
			redirect(base_url('Setup/countryList'));

		}
		// *************************************************************************Country code end*********************************************************//
		// *************************************************************************State code start *********************************************************//
		public function stateList(){
			$url=$this->apiurl."statemaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			$url=$this->apiurl."countrymaster/fetch";
			$resopne2=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200 && $resopne2[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$data['countries']=json_decode($resopne2[0]);
			// $this->load->view('setup/country',$data);
			$this->load->view('setup/state',$data);	
		}
		public function insertState(){
			$data=array(
				'countrycode'=>$this->input->post('country'),
				'statename'=>$this->input->post('statename'),
				'status'  => $this->input->post('status'),
			);
			// date_default_timezone_set('Asia/Kolkata');
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			$url=$this->apiurl."statemaster/add";
			$resopne=$this->InsertDataModel->InsertData($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','insert');
			echo(base_url('Setup/stateList')); 
		}
		public function updateState(){
			$data=array(
				'id'=>$this->input->post('id'),
				'countrycode'=>$this->input->post('country'),
				'statename'=>$this->input->post('statename'),
				'status'  => $this->input->post('status'),
			);
			// print_r($data);
			$url=$this->apiurl."statemaster/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataById($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','updateed');
			echo(base_url('Setup/stateList')); 
		}
		public function deleteState($id){
			$url=$this->apiurl."statemaster/delete/".$id;
			$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('delete','delete Department');
			redirect(base_url('Setup/stateList'));

		}

		// *************************************************************************State code end *********************************************************//
		// *************************************************************************City code Start *********************************************************//
		public function cityList(){
			// state fetching
			$url=$this->apiurl."statemaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			// country fetching
			$url=$this->apiurl."countrymaster/fetch";
			$resopne2=$this->FetchAllDataModel->FetchAllData($url);
			// city fetching
			$url=$this->apiurl."citymaster/fetch";
			$resopne3=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200 && $resopne2[1]!=200 && $resopne3[1]!=200){
				warning();
			}
			$data['states']=json_decode($resopne1[0]);
			$data['countries']=json_decode($resopne2[0]);
			$data['records']=json_decode($resopne3[0]);
			// $this->load->view('setup/country',$data);
			$this->load->view('setup/city',$data);	
		}
		public function insertCity(){
			$data=array(

				'countrycode'=>$this->input->post('country'),
				'statecode'=>$this->input->post('state'),
				'cityname'=>$this->input->post('cityname'),
				'status'  => $this->input->post('status'),
			);
			// date_default_timezone_set('Asia/Kolkata');
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			
			$url=$this->apiurl."citymaster/add";
			$resopne=$this->InsertDataModel->InsertData($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','insert');
			echo(base_url('Setup/cityList')); 
		}
		public function updateCity(){
			$data=array(
				'id'=>$this->input->post('id'),
				'countrycode'=>$this->input->post('country'),
				'statecode'=>$this->input->post('state'),
				'cityname'=>$this->input->post('cityname'),
				'status'  => $this->input->post('status'),
			);
			// print_r($data);
			$url=$this->apiurl."citymaster/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataById($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','updateed');
			echo(base_url('Setup/cityList')); 
		}
		public function deleteCity($id){
			$url=$this->apiurl."citymaster/delete/".$id;
			$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('delete','delete ');
			redirect(base_url('Setup/cityList'));

		}
		// *************************************************************************city code end *********************************************************//
		// *************************************************************************Pincode code start *********************************************************//
		public function pincodeList(){
			// city fetching
			$url=$this->apiurl."citymaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			// Pinocode fetching
			$url=$this->apiurl."pincodemaster/fetch";
			$resopne2=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200 && $resopne2[1]!=200){
				warning();
			}
			$data['citys']=json_decode($resopne1[0]);
			$data['records']=json_decode($resopne2[0]);
			$this->load->view('setup/pincode',$data);	
		}
		public function insertPincode(){
			$data=array(
				'citycode'=>$this->input->post('city'),
				'pincode'=>$this->input->post('pincode'),
				'status'  => $this->input->post('status'),
			);
			// date_default_timezone_set('Asia/Kolkata');
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			
			$url=$this->apiurl."pincodemaster/add";
			$resopne=$this->InsertDataModel->InsertData($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','insert');
			echo(base_url('Setup/pincodeList')); 
		}
		public function updatePincode(){
			$data=array(
				'id'=>$this->input->post('id'),
				'citycode'=>$this->input->post('city'),
				'pincode'=>$this->input->post('pincode'),
				'status'  => $this->input->post('status'),
			);

			$url=$this->apiurl."pincodemaster/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataById($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','updateed');
			echo(base_url('Setup/pincodeList')); 
		}
		public function deletePincode($id){
			$url=$this->apiurl."citymaster/delete/".$id;
			$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('delete','delete ');
			redirect(base_url('Setup/cityList'));

		}
		// *************************************************************************Pincode code end *********************************************************//
		// *************************************************************************Source code start*********************************************************//
		public function sourceList()
		{
			// fetch the data
			$url=$this->apiurl."sourcemaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$this->load->view('setup/source',$data);	
		}
		public function insertSource(){
			$data=array(
				'sourcename'=>$this->input->post('sourcename'),
				'status'  => $this->input->post('status'),
			);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			$url=$this->apiurl."sourcemaster/add";
			$resopne=$this->InsertDataModel->InsertData($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','insert');
			echo(base_url('Setup/sourceList')); 
		}

		public function updateSource(){
			$data=array(
				'id'=>$this->input->post('id'),
				'sourcename'=>$this->input->post('sourcename'),
				'status'  => $this->input->post('status'),
			);
			// print_r($data);
			$url=$this->apiurl."sourcemaster/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataById($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','updateed');
			echo(base_url('Setup/sourceList')); 
		}
		public function deleteSource($id){
			$url=$this->apiurl."sourcemaster/delete/".$id;
			$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('delete','delete Department');
			redirect(base_url('Setup/sourceList'));

		}
		// // *************************************************************************Source code end*********************************************************//
		// // *************************************************************************Issuse code start*********************************************************//
		public function issueList()
		{
			// fetch the data
			$url=$this->apiurl."issuemaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$this->load->view('setup/issue',$data);	
		}
		public function insertIssue(){
			$data=array(
				'issue'=>$this->input->post('issue'),
				'status'  => $this->input->post('status'),
			);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			$url=$this->apiurl."issuemaster/add";
			$resopne=$this->InsertDataModel->InsertData($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('insert','insert');
			echo(base_url('Setup/issueList')); 
		}

		public function updateIssue(){
			$data=array(
				'id'=>$this->input->post('id'),
				'issue'=>$this->input->post('issue'),
				'status'  => $this->input->post('status'),
			);
			// print_r($data);
			$url=$this->apiurl."issuemaster/updated";
			$resopne=$this->UpdateDataByIdModel->UpdateDataById($url,$data);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('update','updateed');
			echo(base_url('Setup/issueList')); 
		}
		public function deleteIssue($id){
			$url=$this->apiurl."issuemaster/delete/".$id;
			$resopne=$this->DeleteDataByIdModel->DeleteDataById($url);
			if($resopne[1]!=200){
				warning();
			}
			$this->session->set_flashdata('delete','delete ');
			redirect(base_url('Setup/issueList'));

		}
		// *************************************************************************Issue code end*********************************************************//



	}
?>