<?php
require_once 'EBPay.function.php';

$TradeInfo = file_get_contents("php://input");
parse_str($TradeInfo, $queryParams);

$data = create_aes_decrypt($queryParams['TradeInfo'], $HashKey, $HashIV);
$json = json_decode($data);

if ($json->Status == "SUCCESS"){ // 付款成功

  // Get MerchantTradeNo example
  $MerchantTradeNo = $json->Result->MerchantOrderNo;

  /**
   *  See more: https://www.newebpay.com/website/Page/content/download_api -> 金流API -> 線上交易─幕前支付
   *  Download this api document and page 51.
   */

}else{
  echo "200 OK";
}
