<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://nisumusa.vtexcommercestable.com.br/api/checkout/pub/orderForm/f04c983604e1425d8c65d2835572ca9f/items/update",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"orderItems\":[{\"seller\":\"1\",\"quantity\":5,\"id\":\"2\",\"index\":0,\"hasBundleItems\":false}],\"expectedOrderFormSections\":[\"items\",\"totalizers\",\"clientProfileData\",\"shippingData\",\"paymentData\",\"sellers\",\"messages\",\"marketingData\",\"clientPreferencesData\",\"storePreferencesData\",\"giftRegistryData\",\"ratesAndBenefitsData\",\"openTextField\",\"commercialConditionData\",\"customData\"],\"noSplitItem\":true}",
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
