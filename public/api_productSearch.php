<?php
$curl = curl_init();
$search_value = $_REQUEST['search'];
$url =  "http://nisumusa.vtexcommercestable.com.br/api/catalog_system/pub/products/search/{$search_value}";

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
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

