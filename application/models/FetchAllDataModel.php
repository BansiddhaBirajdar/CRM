<?php

	class FetchAllDataModel extends CI_Model
	{
		public function __construct(){
			parent::__construct();
		}

		public function FetchAllData($url){
			return getdata($url);
		}
		// public function FetchAllData($url){
		// 	return getdata($url);
		// }
		// public function brandMasterFetchAllData($url){
		// 	return getdata($url);
		// }
		// public function partyMasterFetchAllData($url){
		// 	return getdata($url);
		// }
		
	}	
?>