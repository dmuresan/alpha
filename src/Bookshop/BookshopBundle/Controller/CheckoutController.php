<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CheckoutControler
 *
 * @author dmuresan
 */
namespace Bookshop\BookshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bookshop\BookshopBundle\Entity\Cart;


class CheckoutControler extends Controller{
    
    public function indexAction(){
        
       $form= $this->createForm(new \Bookshop\BookshopBundle\Form\AddressType());
       return $this->render('BookshopBookshopBundle:Page:index.html.twig', array(
                    'products' => $products
        ));
    }
    
}

?>
