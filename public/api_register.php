<?php
$curl = curl_init();
$data = $_REQUEST['data'];
$data = json_decode($data);
$cartParams = '{ 
  "firstName" : "' . $data->firstname . '",
  "lastName" : "' . $data->lastname . '", 
  "email" : "' . $data->email . '",
  "isNewsletterOptIn" : "' . $data->optin . '"
}';
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.vtex.com/nisumusa/dataentities/CL/documents",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
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
  echo $response;
}

