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

  /**
   * This tests that the returned skey is valid
   */
  public function isValidTransaction(NBePayTransaction $nbepay) {
    $key0 = md5(
      $nbepay->getTranID().
      $nbepay->getOrderID().
      $nbepay->getStatus().
      $nbepay->getDomain().
      $nbepay->getAmount().
      $nbepay->getCurrency());
    $key1 = md5(
      $nbepay->getPaydate().
      $nbepay->getDomain().
      $key0.
      $nbepay->getAppcode().
      $this->verify_key);
    return $nbepay->getSkey() == $key1;
  }

  /**
   * This queries against the NBePay servers
   */
  public function queryTransaction(NBePayTransaction $nbepay, NBePayQuery $query) {
    $amount = sprintf('%.2f', $nbepay->getAmount());
    $skey = md5($nbepay->getTranID().$nbepay->getDomain().$this->verify_key.$amount);
    $params = array(
      'amount' => $amount,
      'txId' => $nbepay->getTranID(),
      'domain' => $nbepay->getDomain(),
      'skey' => $skey,
      'type' => 0,
    );

    $curl = curl_init("https://www.onlinepayment.com.my/NBepay/q_by_tid.php");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($curl);
    $lines = explode("\n", $contents);
    foreach ($lines as $line) {
      list($key, $value) = explode(':', $line);
      $key = trim($key);
      $value = trim($value);

      switch ($key) {
        case 'StatCode':
          $query->setStatCode($value);
          break;

        case 'StatName':
          $query->setStatName($value);
          break;

        case 'TranID':
          $query->setTranID($value);
          break;

        case 'Amount':
          $query->setAmount($value);
          break;

        case 'Domain':
          $query->setDomain($value);
          break;

        case 'VrfKey':
          $query->setVrfKey($value);
          break;

        case 'Error 99':
          return false;
      }
    }
  }

}
