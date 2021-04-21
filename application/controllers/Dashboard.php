<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Dashboard extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			// if(!$this->session->userdata('stampusername')){
			// 	redirect('Login');
			// }
		
		}
		public function index(){
			$this->load->view('dashboard');
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
