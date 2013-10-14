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

class CheckoutController extends Controller {

    public function checkoutShippingAction() {
        $this->process($_POST['billing']['street']['0'] . $_POST['billing']['street']['1'], $_POST['billing']['city']
                , $_POST['billing']['country_id'], $_POST['billing']['email'], $_POST['bookshop_bookshopbundle_address']['firstname']
                , $_POST['billing']['lastname'], true
        );
        $form = $this->createForm(new \Bookshop\BookshopBundle\Form\AddressType());
        return $this->render('BookshopBookshopBundle:Page:CheckoutShipping.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    protected function process($street, $city, $country, $email, $firstname, $lastname, $initiate = false) {
        $em = $this->getDoctrine()
                ->getManager();
        $address = new \Bookshop\BookshopBundle\Entity\Address();
        $em->persist($address);
        $address->setAddress($street);
        $address->setCity($city);
        $address->setCountry($country);
        $address->setEmail($email);
        $address->setFirstname($firstname);
        $address->setLastname($lastname);
        if ($initiate) {
            $order = new \Bookshop\BookshopBundle\Entity\Order();
            $em->persist($order);
            $order->setShippingAddress($address);
            $order->setUser($this->getUser());
        } else {
            $order = $em->getRepository('BookshopBookshopBundle:Order')->getOrderForUser($this->getUser());
            $order[0]->setBillingAddress($address);
        }
        $em->flush();
        return $address;
    }

    public function showAction() {
        $form = $this->createForm(new \Bookshop\BookshopBundle\Form\AddressType());

        return $this->render('BookshopBookshopBundle:Page:Checkout.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    protected function shippingandbilling($shipping = false) {

        $em = $this->getDoctrine()
                ->getManager();
        $order = $em->getRepository('BookshopBookshopBundle:Order')->getOrderForUser($this->getUser());
        if ($shipping) {
            $order[sizeof($order)-1]->setShippingMethod($_POST['payment']['method']);
        } else {
            $order[sizeof($order)-1]->setBillingMethod($_POST['payment']['method']);
        }
        $em->flush();
    }

    public function shippingMethodAction() {
         $this->process($_POST['billing']['street']['0'] . $_POST['billing']['street']['1'], $_POST['billing']['city']
                , $_POST['billing']['country_id'], $_POST['billing']['email'], $_POST['bookshop_bookshopbundle_address']['firstname']
                , $_POST['billing']['lastname'], true
        );
        return $this->render('BookshopBookshopBundle:Page:ShippingMethod.html.twig', array());
    }

    public function billingMethodAction() {
        $this->shippingandbilling(true);
        return $this->render("BookshopBookshopBundle:Page:BillingMethod.html.twig", array());
    }
    public function successAction(){
        $this->shippingandbilling();
        return $this->render("BookshopBookshopBundle:Page:Success.html.twig",array());
    }

}

?>
