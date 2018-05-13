<?php
$url = $_REQUEST['url'];
$url = 'https://nisumusa.vtexcommercestable.com.br/checkout/cart/add';
$data = $_REQUEST['data'];
$data = json_decode($data);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_USERAGENT => "Mozilla/5.0 (Macintosh; Intel …) Gecko/20100101 Firefox/59.0",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  die;
}