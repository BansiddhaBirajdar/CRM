
<?php

	class DeleteDataByIdModel extends CI_Model
	{
		public function __construct(){
			parent::__construct();
		}
		public function DeleteDataById($url){
			return getdata($url);
		}

		public function DeleteDataByIdStaff($url){
			return getdata($url);
		}
		public function DeleteDataByIdDepartment($url){
			return getdata($url);
		}
		// public function brandMasterFetchAllData($url){
		// 	return getdata($url);
		// }
		// public function partyMasterFetchAllData($url){
		// 	return getdata($url);
		// }		
	}	
?>