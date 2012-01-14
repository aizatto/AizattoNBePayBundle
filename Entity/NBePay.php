<?php

namespace Aizatto\Bundle\NBePayBundle\Entity;

class NBePay {

  private
    $merchant_id,
    $verify_key;

  public function __construct($merchant_id, $verify_key) {
    $this->merchant_id = $merchant_id;
    $this->verify_key = $verify_key;
  }

  public function generateURL(array $params = array()) {
    $params['vcode'] = $this->generateVcode($params['amount'], $params['orderid']);
    $query_string = http_build_query($params);

    return "https://www.onlinepayment.com.my/NBepay/pay/{$this->merchant_id}/?{$query_string}";
  }

  public function generateVcode($amount, $order_id) {
    return md5($amount.$this->merchant_id.$order_id.$this->verify_key);
  }

}
