<?php

namespace Aizatto\Bundle\NBePayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aizatto\Bundle\NBePayBundle\Entity\NBePayQuery
 */
abstract class NBePayQuery
{
  /**
   * @var integer $id
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string $statCode
   *
   * @ORM\Column(name="statCode", type="string", length=2)
   */
  protected $statCode;

  /**
   * @var string $statName
   *
   * @ORM\Column(name="statName", type="string", length=255)
   */
  protected $statName;

  /**
   * @var string $tranID
   *
   * @ORM\Column(name="tranID", type="bigint")
   */
  protected $tranID;

  /**
   * @var decimal $amount
   *
   * @ORM\Column(name="amount", type="decimal")
   */
  protected $amount;

  /**
   * @var string $domain
   *
   * @ORM\Column(name="domain", type="string", length=255)
   */
  protected $domain;

  /**
   * @var string $vrfKey
   *
   * @ORM\Column(name="vrfKey", type="string", length=255)
   */
  protected $vrfKey;

  /**
   * @var string $created_at
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
   * Get id
   *
   * @return integer 
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set statCode
   *
   * @param string $statCode
   */
  public function setStatCode($statCode)
  {
    $this->statCode = $statCode;
    return $this;
  }

  /**
   * Get statCode
   *
   * @return string 
   */
  public function getStatCode()
  {
    return $this->statCode;
  }

  /**
   * Set statName
   *
   * @param string $statName
   */
  public function setStatName($statName)
  {
    $this->statName = $statName;
    return $this;
  }

  /**
   * Get statName
   *
   * @return string 
   */
  public function getStatName()
  {
    return $this->statName;
  }

  /**
   * Set tranID
   *
   * @param string $tranID
   */
  public function setTranID($tranID)
  {
    $this->tranID = $tranID;
    return $this;
  }

  /**
   * Get tranID
   *
   * @return string 
   */
  public function getTranID()
  {
    return $this->tranID;
  }

  /**
   * Set amount
   *
   * @param decimal $amount
   */
  public function setAmount($amount)
  {
    $this->amount = $amount;
    return $this;
  }

  /**
   * Get amount
   *
   * @return decimal 
   */
  public function getAmount()
  {
    return $this->amount;
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
   * Set vrfKey
   *
   * @param string $vrfKey
   */
  public function setVrfKey($vrfKey)
  {
      $this->vrfKey = $vrfKey;
  }

  /**
   * Get vrfKey
   *
   * @return string 
   */
  public function getVrfKey()
  {
    return $this->vrfKey;
  }

  /**
   * Set created_at
   *
   * @param string $createdAt
   */
  public function setCreatedAt($createdAt)
  {
    $this->created_at = $createdAt;
    return $this;
  }

  /**
   * Get created_At
   *
   * @return string 
   */
  public function getCreatedAt()
  {
    return $this->created_at;
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
    return $this->statCode == "00";
  }

  public function isFailure() {
    return $this->statCode == "11";
  }

  public function isPending() {
    return $this->statCode == "22";
  }

}
