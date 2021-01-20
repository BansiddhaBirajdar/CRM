<?php		
 function getdata($url)
 {
        $CI =& get_instance();
        $apiKey=$CI->config->item('apikey');

        $curl = curl_init($url);
	    curl_setopt_array($curl, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json','APIKEY:'.$apiKey
				),
			));
			$respose=curl_exec($curl);
			$HTTPCODE=curl_getinfo($curl,CURLINFO_HTTP_CODE);
			curl_close($curl);
			return array($respose,$HTTPCODE);
 }
 /********************************************************************************/
        function postdata($url,$data){
        $CI =& get_instance();
        $apiKey=$CI->config->item('apikey');
        $ch = curl_init($url);
        $d=json_encode($data);
	    curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POSTFIELDS => $d,
				CURLOPT_ENCODING => "",
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json','APIKEY:'.$apiKey
				),
			));
	    $respose = curl_exec($ch);
	    $HTTPCODE=curl_getinfo($ch,CURLINFO_HTTP_CODE);
	    curl_close($ch);
	    return array($respose,$HTTPCODE);

 	}
 	function warning(){
 		return die('<script type="text/javascript">alert("something went wrong at server end ?");</script>');

 	}
?>