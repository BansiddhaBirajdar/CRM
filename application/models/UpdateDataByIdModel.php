<?php

	class UpdateDataByIdModel extends CI_Model
	{
		public function __construct(){
			parent::__construct();
		}
		
		public function UpdateDataById($url,$data){	
            return postdata($url,$data);
		}

		public function UpdateDataByIdStaff($url,$data){
			
            return postdata($url,$data);
		}
		public function UpdateDataByIdDepartment($url,$data){
			
            return postdata($url,$data);
		}
		
	}	
?>