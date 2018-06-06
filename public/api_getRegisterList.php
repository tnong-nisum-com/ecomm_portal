<?php
$curl = curl_init();
$email = $_REQUEST['email'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://nisumusa.vtexcommercestable.com.br/api/ds/pub/documents/CL",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => $cartParams,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "X-VTEX-API-AppKey: vtexappkey-nisumusa-KMTWAB",
    "X-VTEX-API-AppToken: BPOZNSBZNJCSBKOZNQKFYBSBTQHRJQJAZLGLXFYEHABGPDUPSGYZOJCAXMGWLKQWABSQDDBISFXYZLMPWRYCSJLQIGOKYBTXJFGNLEMPFPHIMDALAQATLOEQPCHWORKQ"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	$client_list = json_decode($response);
	$client_email = [];
	foreach($client_list->Documents as $client){
		array_push($client_email, $client->email);
	}
	//check if email exists
	if(in_array($email, $client_email)){
		echo '{"confirm":1}';
	}else{
		echo '{"confirm":0}';
	}
	die;
}

