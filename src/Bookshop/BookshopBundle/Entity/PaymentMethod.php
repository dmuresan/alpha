<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaymentMethod
 *
 * @author dmuresan
 */

namespace Bookshop\BookshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Bookshop\BookshopBundle\Entity\Repository\PaymentMethodRepository")
 * @ORM\Table(name="payment_methods")
 */
class PaymentMethod {
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

//      public function __construct($id){
//        $this->id=$id;
//    }

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
     * @return PaymentMethod
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
}