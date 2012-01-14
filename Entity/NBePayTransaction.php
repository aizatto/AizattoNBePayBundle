<?php

namespace Aizatto\Bundle\NBePayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aizatto\Bundle\NBePayBundle\Entity\NBePayTransaction
 */
abstract class NBePayTransaction
{
  /**
   * @var string $amount
   *
   * @ORM\Column(name="amount", type="string", length=255, nullable="true")
   */
  protected $amount;

  /**
   * @var string $orderid
   *
   * @ORM\Column(name="orderid", type="string", length=32)
   */
  protected $orderid;

  /**
   * @var string $appcode
   *
   * @ORM\Column(name="appcode", type="string", length=255, nullable="true")
   */
  protected $appcode;

  /**
   * @var bigint $tranID
   *
   * @ORM\Column(name="tranID", type="bigint")
   */
  protected $tranID;

  /**
   * @var string $domain
   *
   * @ORM\Column(name="domain", type="string", length=255)
   */
  protected $domain;

  /**
   * @var string $status
   *
   * @ORM\Column(name="status", type="string", length=255)
   */
  protected $status;

  /**
   * @var string $currency
   *
   * @ORM\Column(name="currency", type="string", length=3)
   */
  protected $currency;

  /**
   * @var datetime $paydate
   *
   * @ORM\Column(name="paydate", type="string", length=19)
   */
  protected $paydate;

  /**
   * @var string $skey
   *
   * @ORM\Column(name="skey", type="string", length=255, nullable="true")
   */
  protected $skey;

  /**
   * @var string $channel
   *
   * @ORM\Column(name="channel", type="string", length=255)
   */
  protected $channel;

  /**
   * @var datetime $created_at
   *
   * @ORM\Column(name="created_at", type="datetime")
   */
  protected $created_at;

  /**
   * @var string $ip_address
   *
   * @ORM\Column(name="ip_address", type="string", length=15)
   */
  protected $ip_address;

  /**
   * @var string $session_id
   *
   * @ORM\Column(name="session_id", type="string", length=255)
   */
  protected $session_id;

  /**
   * Set amount
   *
   * @param string $amount
   */
  public function setAmount($amount)
  {
    $this->amount = $amount;
    return $this;
  }

  /**
   * Get amount
   *
   * @return string 
   */
  public function getAmount()
  {
    return $this->amount;
  }

  /**
   * Set orderid
   *
   * @param string $orderid
   */
  public function setOrderid($orderid)
  {
    $this->orderid = $orderid;
    return $this;
  }

  /**
   * Get orderid
   *
   * @return string 
   */
  public function getOrderid()
  {
    return $this->orderid;
  }

  /**
   * Set appcode
   *
   * @param string $appcode
   */
  public function setAppcode($appcode)
  {
    $this->appcode = $appcode;
    return $this;
  }

  /**
   * Get appcode
   *
   * @return string 
   */
  public function getAppcode()
  {
    return $this->appcode;
  }

  /**
   * Set tranID
   *
   * @param bigint $tranID
   */
  public function setTranID($tranID)
  {
    $this->tranID = $tranID;
    return $this;
  }

  /**
   * Get tranID
   *
   * @return bigint 
   */
  public function getTranID()
  {
    return $this->tranID;
  }

  /**
   * Set domain
   *
   * @param string $domain
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
    return $this;
  }

  /**
   * Get domain
   *
   * @return string 
   */
  public function getDomain()
  {
    return $this->domain;
  }

  /**
   * Set status
   *
   * @param string $status
   */
  public function setStatus($status)
  {
    $this->status = $status;
    return $this;
  }

  /**
   * Get status
   *
   * @return string 
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set currency
   *
   * @param string $currency
   */
  public function setCurrency($currency)
  {
    $this->currency = $currency;
    return $this;
  }

  /**
   * Get currency
   *
   * @return string 
   */
  public function getCurrency()
  {
    return $this->currency;
  }

  /**
   * Set paydate
   *
   * @param datetime $paydate
   */
  public function setPaydate($paydate)
  {
    $this->paydate = $paydate;
    return $this;
  }

  /**
   * Get paydate
   *
   * @return datetime 
   */
  public function getPaydate()
  {
    return $this->paydate;
  }

  /**
   * Set skey
   *
   * @param string $skey
   */
  public function setSkey($skey)
  {
    $this->skey = $skey;
    return $this;
  }

  /**
   * Get skey
   *
   * @return string 
   */
  public function getSkey()
  {
    return $this->skey;
  }

  /**
   * Set channel
   *
   * @param string $channel
   */
  public function setChannel($channel)
  {
    $this->channel = $channel;
    return $this;
  }

  /**
   * Get channel
   *
   * @return string 
   */
  public function getChannel()
  {
    return $this->channel;
  }

  /**
   * Set created_at
   *
   * @param datetime $createdAt
   */
  public function setCreatedAt($createdAt)
  {
    $this->created_at = $createdAt;
    return $this;
  }

  /**
   * Get created_at
   *
   * @return datetime 
   */
  public function getCreatedAt()
  {
    return $this->created_at;
    return $this;
  }

  /**
   * Set ip_address
   *
   * @param string $ipAddress
   */
  public function setIpAddress($ipAddress)
  {
    $this->ip_address = $ipAddress;
    return $this;
  }

  /**
   * Get ip_address
   *
   * @return string 
   */
  public function getIpAddress()
  {
    return $this->ip_address;
  }

  /**
   * Set session_id
   *
   * @param string $sessionId
   */
  public function setSessionId($sessionId)
  {
    $this->session_id = $sessionId;
    return $this;
  }

  /**
   * Get session_id
   *
   * @return string 
   */
  public function getSessionId()
  {
    return $this->session_id;
  }

  public function isSuccess() {
    return $this->status == "00";
  }

  public function isFailure() {
    return !$this->isSuccess();
  }

}
