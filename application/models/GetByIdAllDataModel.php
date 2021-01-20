<?php

	class GetByIdAllDataModel extends CI_Model
	{
		public function __construct(){
			parent::__construct();
		}
		public function GetByIdAllData($url){
			 return getdata($url);
		}

		public function GetByIdAllDataStaff($url){
			 return getdata($url);
		}
		public function GetByIdAllDataDepartment($url){
			 return getdata($url);
		}
	}	
?>