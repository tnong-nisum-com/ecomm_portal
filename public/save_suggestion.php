<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.vtex.com/nisumusa/suggestions/{{seller}}/{{sellerskuid}}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_POSTFIELDS => "{\n    \"product\": \"Produto exemplo\",\n    \"sku\": \"Sku exemplo\",\n    \"description\": \"exemplo\",\n    \"category\": \"Categoria 1\",\n    \"brand\": \"Marca 1\",\n    \"price\": 299.99,\n    \"color\": \"White\",\n    \"size\": \"10\",\n    \"Images\": [\n    {\n      \"FileId\": 1,\n      \"ImageName\": \"Principal\",\n      \"ImageUrl\": \"imageurl\"\n    }\n  ]\n}",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/vnd.vtex.suggestion.v0+json",
    "Content-Type: application/json",
    "x-vtex-api-appKey: {{appkey}}",
    "x-vtex-api-appToken: {{apptoken}}"
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