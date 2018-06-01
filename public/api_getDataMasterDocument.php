<?php
$curl = curl_init();
$entity = $_POST['entity'];
$document_id = $_POST['id'];
$fields = $_POST['fields'];

//if $view_all exists
if(isset($fields) && !empty($fields) && $fields === 'all' ){
    $url = "http://api.vtex.com/Nisum/dataentities/" . $entity . "/documents/" . $document_id . '?_fields=_all';
}else{
    $url = "http://api.vtex.com/Nisum/dataentities/" . $entity . "/documents/" . $document_id . '?_fields=' . $fields;
}

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
