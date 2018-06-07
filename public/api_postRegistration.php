<?php
$curl = curl_init();
$data_entity = $_REQUEST['entity'];
$mail = $_REQUEST['email'];
$url =  "http://api.vtex.com/nisumusa/dataentities/" . $data_entity . "/documents";
$form = '{"email":' . $mail . '}';

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $form,
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
	echo $response;
}

