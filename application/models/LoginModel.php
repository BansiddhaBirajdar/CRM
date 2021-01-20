<?php

	class LoginModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->apiurl=$this->config->item('url');
			date_default_timezone_set('Asia/Kolkata');
			
		}
		public function validate(){
			$url = $this->apiurl.'login';
			$req=array(
						'email'=>$this->input->post('email'),
						'password'=>$this->input->post('pass')
					);
			$req['lastlogin']=date("l/d/F/Y h:i:s a");
			
			return postdata($url,$req);			
		}	
	}	
?>