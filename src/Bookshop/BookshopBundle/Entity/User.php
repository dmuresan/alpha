<?php

namespace Bookshop\BookshopBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Bookshop\BookshopBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * 
    
     */
    protected $firstname;

    /**
     * @ORM\Column(type="integer")
     */
    protected $gender;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * @ORM\Column(type="integer")
 
     * 
     */
    protected $mobile;

    /**
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="shipping_id", referencedColumnName="id")
     **/
    protected $shipping_address;
    
   
     /**
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="billing_id", referencedColumnName="id")
     **/
    protected $billing_address;
    
      
    protected $cart;
    public function __construct() {
        parent::__construct();
       
        // your ow
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return User
     */
    public function setMobile($mobile) {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile() {
        return $this->mobile;
    }


    /**
     * Set gender
     *
     * @param string $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set cart
     *
     * @param integer $cart
     * @return User
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    
        return $this;
    }

    /**
     * Get cart
     *
     * @return integer 
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Add cart
     *
     * @param \Bookshop\BookshopBundle\Entity\Cart $cart
     * @return User
     */
    public function addCart(\Bookshop\BookshopBundle\Entity\Cart $cart)
    {
        $this->cart[] = $cart;
    
        return $this;
    }

    /**
     * Remove cart
     *
     * @param \Bookshop\BookshopBundle\Entity\Cart $cart
     */
    public function removeCart(\Bookshop\BookshopBundle\Entity\Cart $cart)
    {
        $this->cart->removeElement($cart);
    }

    /**
     * Set shipping_address
     *
     * @param string $shippingAddress
     * @return User
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shipping_address = $shippingAddress;
    
        return $this;
    }

    /**
     * Get shipping_address
     *
     * @return string 
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Set billing_address
     *
     * @param string $billingAddress
     * @return User
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billing_address = $billingAddress;
    
        return $this;
    }

    /**
     * Get billing_address
     *
     * @return string 
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }
}