<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author dmuresan
 */

namespace Bookshop\BookshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Orders")
 */
class Order {
/**
 *
 * @ORM\ID
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO") 
 */
    protected $id;
 /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    protected $user_id;
  /**
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="billing_id", referencedColumnName="id")
     **/
    protected $billing_address_id;
  /**
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="shipping_id", referencedColumnName="id")
     **/
    protected $shipping_address_id;
 /**
     * @ORM\OneToOne(targetEntity="Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     **/
    protected $cart_id;
    /**
     * @ORM\Column(type="integer")
     */
    protected $total;
    /**
     * @ORM\Column(type="string")
     */
    protected $date;
    /**
     * @ORM\Column(type="integer")
     */
    protected $state_id;
     /**
     * @ORM\OneToOne(targetEntity="ShippingMethod")
     * @ORM\JoinColumn(name="shippingMethod_id", referencedColumnName="id")
     **/
    protected $shipping_method_id;
     /**
     * @ORM\OneToOne(targetEntity="Cart")
     * @ORM\JoinColumn(name="paymentMethod_id", referencedColumnName="id")
     **/
    protected $payment_method_id;
    protected $paymentmethod;
    protected $shippingmethod;
    protected $shippingaddress;
    protected $billingaddress;
    protected $user;
    protected $state;


    

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
     * Set total
     *
     * @param integer $total
     * @return Order
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Order
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set state_id
     *
     * @param integer $stateId
     * @return Order
     */
    public function setStateId($stateId)
    {
        $this->state_id = $stateId;
    
        return $this;
    }

    /**
     * Get state_id
     *
     * @return integer 
     */
    public function getStateId()
    {
        return $this->state_id;
    }

    /**
     * Set user_id
     *
     * @param \Bookshop\BookshopBundle\Entity\User $userId
     * @return Order
     */
    public function setUserId(\Bookshop\BookshopBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return \Bookshop\BookshopBundle\Entity\User 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set billing_address_id
     *
     * @param \Bookshop\BookshopBundle\Entity\Address $billingAddressId
     * @return Order
     */
    public function setBillingAddressId(\Bookshop\BookshopBundle\Entity\Address $billingAddressId = null)
    {
        $this->billing_address_id = $billingAddressId;
    
        return $this;
    }

    /**
     * Get billing_address_id
     *
     * @return \Bookshop\BookshopBundle\Entity\Address 
     */
    public function getBillingAddressId()
    {
        return $this->billing_address_id;
    }

    /**
     * Set shipping_address_id
     *
     * @param \Bookshop\BookshopBundle\Entity\Address $shippingAddressId
     * @return Order
     */
    public function setShippingAddressId(\Bookshop\BookshopBundle\Entity\Address $shippingAddressId = null)
    {
        $this->shipping_address_id = $shippingAddressId;
    
        return $this;
    }

    /**
     * Get shipping_address_id
     *
     * @return \Bookshop\BookshopBundle\Entity\Address 
     */
    public function getShippingAddressId()
    {
        return $this->shipping_address_id;
    }

    /**
     * Set cart_id
     *
     * @param \Bookshop\BookshopBundle\Entity\Cart $cartId
     * @return Order
     */
    public function setCartId(\Bookshop\BookshopBundle\Entity\Cart $cartId = null)
    {
        $this->cart_id = $cartId;
    
        return $this;
    }

    /**
     * Get cart_id
     *
     * @return \Bookshop\BookshopBundle\Entity\Cart 
     */
    public function getCartId()
    {
        return $this->cart_id;
    }

    /**
     * Set shipping_method_id
     *
     * @param \Bookshop\BookshopBundle\Entity\ShippingMethod $shippingMethodId
     * @return Order
     */
    public function setShippingMethodId(\Bookshop\BookshopBundle\Entity\ShippingMethod $shippingMethodId = null)
    {
        $this->shipping_method_id = $shippingMethodId;
    
        return $this;
    }

    /**
     * Get shipping_method_id
     *
     * @return \Bookshop\BookshopBundle\Entity\ShippingMethod 
     */
    public function getShippingMethodId()
    {
        return $this->shipping_method_id;
    }

    /**
     * Set payment_method_id
     *
     * @param \Bookshop\BookshopBundle\Entity\Cart $paymentMethodId
     * @return Order
     */
    public function setPaymentMethodId(\Bookshop\BookshopBundle\Entity\Cart $paymentMethodId = null)
    {
        $this->payment_method_id = $paymentMethodId;
    
        return $this;
    }

    /**
     * Get payment_method_id
     *
     * @return \Bookshop\BookshopBundle\Entity\Cart 
     */
    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }
}