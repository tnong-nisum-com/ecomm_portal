<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://nisumusa.vtexcommercestable.com.br/api/dataentities/Register/documents/90e4d83a-86ab-4352-bd0e-d55aaf6ee174",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
//  CURLOPT_POSTFIELDS => $cartParams,
//  CURLOPT_HTTPHEADER => array(
//    "Content-Type: application/json",
//    "X-VTEX-API-AppKey: vtexappkey-nisumusa-KMTWAB",
//    "X-VTEX-API-AppToken: BPOZNSBZNJCSBKOZNQKFYBSBTQHRJQJAZLGLXFYEHABGPDUPSGYZOJCAXMGWLKQWABSQDDBISFXYZLMPWRYCSJLQIGOKYBTXJFGNLEMPFPHIMDALAQATLOEQPCHWORKQ"
//  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

