<?php
$curl = curl_init();
$data = $_REQUEST['data'];
$data = json_decode($data);
$cartParams = '{"orderItems":[{"seller":"1","quantity":' . $data->qty . ',"id":"' . $data->sku . '","index":2,"hasBundleItems":false}],"expectedOrderFormSections":["items","totalizers","clientProfileData","shippingData","paymentData","sellers","messages","marketingData","clientPreferencesData","storePreferencesData","giftRegistryData","ratesAndBenefitsData","openTextField","commercialConditionData","customData"],"noSplitItem":true}';
$url = "https://nisumusa.vtexcommercestable.com.br/api/checkout/pub/orderForm/" . $data->orderFormId . "/items";

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
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
//curl_getinfo($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
