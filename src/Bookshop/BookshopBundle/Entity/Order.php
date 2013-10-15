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
 * @ORM\Entity(repositoryClass="Bookshop\BookshopBundle\Entity\Repository\OrderRepository")
 * @ORM\Table(name="Orders")
 */
class Order {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User",  cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    protected $user;
          /**
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="billing_address_id", referencedColumnName="id")
     */
    protected $billing_address;
          /**
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="shipping_address_id", referencedColumnName="id")
     */
    protected $shipping_address;
          /**
     * @ORM\OneToOne(targetEntity="Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    protected $cart;
    protected $total;
    protected $date;
    protected $state;
   /**
     * @ORM\OneToOne(targetEntity="ShippingMethod")
     * @ORM\JoinColumn(name="shipping_method_id", referencedColumnName="id")
     */
    protected $shipping_method;
/**
     * @ORM\OneToOne(targetEntity="PaymentMethod")
     * @ORM\JoinColumn(name="billing_method_id", referencedColumnName="id")
     */
    protected $payment_method;


    public function setShippingMethod($shipping_method){
        $this->shipping_method=$shipping_method;
    }
    public function getShippingMethod(){
        return $this->shipping_method;
        
    }
    public function getBillingMethod(){
        return $this->payment_method;
    }
    public function setBillingMethod($billing_method){
        $this->billing_method=$billing_method;
    }

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
     * Set user
     *
     * @param \Bookshop\BookshopBundle\Entity\User $user
     * @return Order
     */
    public function setUser(\Bookshop\BookshopBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Bookshop\BookshopBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set billing_address
     *
     * @param \Bookshop\BookshopBundle\Entity\Address $billingAddress
     * @return Order
     */
    public function setBillingAddress(\Bookshop\BookshopBundle\Entity\Address $billingAddress = null)
    {
        $this->billing_address = $billingAddress;
    
        return $this;
    }

    /**
     * Get billing_address
     *
     * @return \Bookshop\BookshopBundle\Entity\Address 
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * Set shipping_address
     *
     * @param \Bookshop\BookshopBundle\Entity\Address $shippingAddress
     * @return Order
     */
    public function setShippingAddress(\Bookshop\BookshopBundle\Entity\Address $shippingAddress = null)
    {
        $this->shipping_address = $shippingAddress;
    
        return $this;
    }

    /**
     * Get shipping_address
     *
     * @return \Bookshop\BookshopBundle\Entity\Address 
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Set cart
     *
     * @param \Bookshop\BookshopBundle\Entity\Cart $cart
     * @return Order
     */
    public function setCart(\Bookshop\BookshopBundle\Entity\Cart $cart = null)
    {
        $this->cart = $cart;
    
        return $this;
    }

    /**
     * Get cart
     *
     * @return \Bookshop\BookshopBundle\Entity\Cart 
     */
    public function getCart()
    {
        return $this->cart;
    }
    

    /**
     * Set payment_method
     *
     * @param \Bookshop\BookshopBundle\Entity\BillingMethod $paymentMethod
     * @return Order
     */
    public function setPaymentMethod(\Bookshop\BookshopBundle\Entity\PaymentMethod $paymentMethod = null)
    {
        $this->payment_method = $paymentMethod;
    
        return $this;
    }

    /**
     * Get payment_method
     *
     * @return \Bookshop\BookshopBundle\Entity\BillingMethod 
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }
}