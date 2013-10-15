<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShippingMethod
 *
 * @author dmuresan
 */

namespace Bookshop\BookshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Bookshop\BookshopBundle\Entity\Repository\ShippingMethodRepository")
 * @ORM\Table(name="shipping_methods")
 */
class ShippingMethod {
    /**
 *
 * @ORM\ID
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO") 
 */

    protected $id;
      /**
     * @ORM\Column(type="string")
     */
    protected $name;
      /**
     * @ORM\Column(type="integer")
     */
    protected $price;

    
    public function __construct($id){
        $this->id=$id;
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
     * Set name
     *
     * @param string $name
     * @return ShippingMethod
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return ShippingMethod
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }
}