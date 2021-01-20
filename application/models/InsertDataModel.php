<?php

	class InsertDataModel extends CI_Model
	{
		public function __construct(){
			parent::__construct();
		}
		public function InsertData($url,$data){
			return postdata($url,$data);
		}

		public function InsertDataStaff($url,$data){
			return postdata($url,$data);
		}
		public function InsertDataDepartment($url,$data){
			return postdata($url,$data);
		}
		
	}	
?>