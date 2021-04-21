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
		public function manageLeads(){
			// customermaster
			$url=$this->apiurl."leadsmaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$this->load->view('leads/leadslist',$data);	


		}
		public function SuccessLeads()
		{
			// customermaster
			$url=$this->apiurl."leadsmaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$data['SuccessLeads']=1;
			$this->load->view('leads/successleadlist',$data);

		}
		public function PenddingLeads()
		{
			// customermaster
			$url=$this->apiurl."leadsmaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			$data['PenddingLeads']=1;
			$this->load->view('leads/successleadlist',$data);
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
		function insertDataLeads()
		{
			$photo='';
			$photo  = $_FILES['photo']['name'];
			$temp = explode(".", $_FILES["photo"]["name"]);
			$photo = round(date('dmYhis')) . '.' . end($temp);	
                
            move_uploaded_file($_FILES["photo"]["tmp_name"],'./images/LeadsandCustomer/'.$photo);
	                
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
				'soruce_id'=>$this->input->post('source'),
				's_id'=>$this->input->post('staffid'),
				'flag'=>'L',
				'status'=>$this->input->post('status'),
				'comments'=>$this->input->post('Comments'),
				

				);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			$url=$this->apiurl."leadsmaster/add";
			$respone=$this->InsertDataModel->InsertDataDepartment($url,$data);
			if($respone[1]==200){
						$this->session->set_flashdata('success','Data successfully Add ');
						redirect(base_url('Leads/manageLeads'));
            }
            else{
                    warning();
            }
		}
		public function getdetailLeads($id,$value=0)
		{
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
			// ladas
			$url=$this->apiurl."customermaster/getdetail/".$id;
			$resopne8=$this->FetchAllDataModel->FetchAllData($url);
				// ladas
			$url=$this->apiurl."leadsmaster/getdetail/".$id;
			$resopne9=$this->FetchAllDataModel->FetchAllData($url);
			

			if($resopne1[1]!=200 && $resopne2[1]!=200 && $resopne3[1]!=200 && $resopne4[1]!=200 && $resopne5[1]!=200 && $resopne6[1]!=200 && $resopne7[1]!=200 && $resopne8[0]!=200)
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
			$data['record']=json_decode($resopne8[0]);
			$data['leads']=json_decode($resopne9[0]);
			$data['value']=$value;
			$this->load->view('leads/insertandupdateleads',$data);


		}
		public function UpdateDataLeads($id)
		{

			$url=$this->apiurl."customermaster/getdetail/".$id;
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
					move_uploaded_file($_FILES["photo"]["tmp_name"],'./images/LeadsandCustomer/'.$photo);	 
	                
	                unlink('./images/LeadsandCustomer/'.$records->image);

   				}


			$data=array(
				'id'=>$id,
				'name'=>$this->input->post('name'),
				'mobileno'=>$this->input->post('mobileno'),
				'street'=>$this->input->post('street'),
				'countryid'=>$this->input->post('countryid'),
				'stateid'=>$this->input->post('stateid'),
				'cityid'=>$this->input->post('citiestyid'),
				'pincode'=>$this->input->post('pincode'),
				'image'=>$photo,
				'email'=>$this->input->post('email'),
				'soruce_id'=>$this->input->post('source'),
				's_id'=>$this->input->post('staffid'),
				'flag'=>'L',
				'status'=>$this->input->post('status'),
				'comments'=>$this->input->post('Comments'),
				

				);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			$url=$this->apiurl."leadsmaster/updated";
			$respone=$this->InsertDataModel->InsertDataDepartment($url,$data);
			if($respone[1]==200){
						$this->session->set_flashdata('success','Data successfully Add ');
						redirect(base_url('Leads/manageLeads'));
              }
              else{
                    warning();
              }



		}

		public function converCustomer($id)
		{
			// leadsmaster/converCustomer
			$url=$this->apiurl."leadsmaster/converCustomer/".$id;
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			// //leadsmaster? 
			$url=$this->apiurl."customermaster/getdetail/".$id;
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data=json_decode($resopne1[0]);

			 // loginmaster/add
			
			$data=array(
				'staffid'=>$data->id, 
				'email'=>$data->email,
			 	'password'=>$data->email,
			  	'status'=>'Y', 
			  	'role'=>'C', 
			  	'lastlogin'=>date("l/d/F/Y h:i:s a")
			);
			$url=$this->apiurl."loginmaster/add/".$id;
			$respone=$this->InsertDataModel->InsertDataDepartment($url,$data);
			if($respone[1]!=200){
				warning();
			}
			redirect(base_url('Leads/manageLeads'));
		}
		/*************************************************************************************/ 
		/*                                Customer code                                      */
		/*                                                                                   */
		/*************************************************************************************/
		
		public function manageCustomer(){
			// customermaster
			$url=$this->apiurl."customermaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200){
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			// print_r($data);
			// exit();
			$this->load->view('leads/customerlist',$data);	


		}


		public function addCustomer(){
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
			$this->load->view('leads/insertandupdateCustomer',$data);

			
		}

		function insertDataCustomer()
		{
			$photo='';
			$photo  = $_FILES['photo']['name'];
			$temp = explode(".", $_FILES["photo"]["name"]);
			$photo = round(date('dmYhis')) . '.' . end($temp);	
                
            move_uploaded_file($_FILES["photo"]["tmp_name"],'./images/LeadsandCustomer/'.$photo);
	                
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
				'flag'=>'C',

				'lemail'=>$this->input->post('lemail'),
				'password'=>$this->input->post('password'),
				'status'=>$this->input->post('status'),
				'role'=>'C',
				'lastlogin'=>date("l/d/F/Y h:i:s a")
				);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			$url=$this->apiurl."customermaster/add";
			$respone=$this->InsertDataModel->InsertDataDepartment($url,$data);
			if($respone[1]==200){
						$this->session->set_flashdata('success','Data successfully Add ');
						redirect(base_url('Leads/manageCustomer'));
            }
            else{
                    warning();
            }
		}

		public function getdetailCustomer($id)
		{
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
			// ladas
			$url=$this->apiurl."customermaster/getdetail/".$id;
			$resopne8=$this->FetchAllDataModel->FetchAllData($url);
				// ladas
			$url=$this->apiurl."loginmaster/getdetail/".$id;
			$resopne9=$this->FetchAllDataModel->FetchAllData($url);
			

			if($resopne1[1]!=200 && $resopne2[1]!=200 && $resopne3[1]!=200 && $resopne4[1]!=200 && $resopne5[1]!=200 && $resopne6[1]!=200 && $resopne7[1]!=200 && $resopne8[0]!=200)
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
			$data['record']=json_decode($resopne8[0]);
			
			$data['login']=json_decode($resopne9[0]);

			// print_r($data);
			$this->load->view('leads/insertandupdateCustomer',$data);


		}

		public function UpdateDataCustomer($id)
		{

			$url=$this->apiurl."customermaster/getdetail/".$id;
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
					move_uploaded_file($_FILES["photo"]["tmp_name"],'./images/LeadsandCustomer/'.$photo);	 
	                
	                unlink('./images/LeadsandCustomer/'.$records->image);

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
				'flag'=>'C',
				'lemail'=>$this->input->post('lemail'),
				'password'=>$this->input->post('password'),
				'status'=>$this->input->post('status'),
				'role'=>'C',
				'lastlogin'=>date("l/d/F/Y h:i:s a")	

				);
			$data['stampdate']=date('d-M-Y');
			$data['stamptime']=date('h:i:s a');
			$data['stampuserid']=$this->session->userdata('stampuserid');
			$data['stampusername']=$this->session->userdata('stampusername');
			$url=$this->apiurl."customermaster/updated";
			$respone=$this->InsertDataModel->InsertDataDepartment($url,$data);
			if($respone[1]==200){
						$this->session->set_flashdata('success','Data successfully Add ');
						if($this->session->userdata('role')=='C')
						{
							redirect(base_url('Dashboard/dashboardcustomer'));
						}
						else{

							redirect(base_url('Leads/manageCustomer'));
						}
              }
              else{
                    warning();
              }



		}

		public function CustomerTicktes($id,$c_name)
		{
			
			$url=$this->apiurl."ticketsmaster/bycustomerid/".$id;
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);
			if($resopne1[1]!=200)
			{
				warning();
			}
			$data['records']=json_decode($resopne1[0]);
			
			$data['c_name']=$c_name;
			$data['c_id']=$id;
			$this->load->view('leads/customerTicktesList',$data);

		}
		public function addTicketCustomer($id)
		{
			//productsmaster 
			$url=$this->apiurl."productsmaster/fetch";
			$resopne1=$this->FetchAllDataModel->FetchAllData($url);

			//Customer master
			$url=$this->apiurl."customermaster/fetch";
			$resopne2=$this->FetchAllDataModel->FetchAllData($url);

			//issuemaster 
			$url=$this->apiurl."issuemaster/fetch";
			$resopne3=$this->FetchAllDataModel->FetchAllData($url);

			//staffmaster 
			$url=$this->apiurl."staffmaster/fetch";
			$resopne4=$this->FetchAllDataModel->FetchAllData($url);


			if($resopne1[1]!=200 && $resopne2[1]!=200  && $resopne3[1]!=200 && $resopne4[1]!=200){
				warning();
			}
			$data['products']=json_decode($resopne1[0]);
			$data['customer']=json_decode($resopne2[0]);
			$data['issue']=json_decode($resopne3[0]);
			$data['staff']=json_decode($resopne4[0]);
			$data['cid']=$id;
			// print_r($data);
			$this->load->view('tickets/insertAndUpdateTickets',$data);
		}

	}
?>