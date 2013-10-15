<?php
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
                , $_POST['billing']['lastname']
        );
        $form = $this->createForm(new \Bookshop\BookshopBundle\Form\AddressType());
        
        return $this->render('BookshopBookshopBundle:Page:CheckoutShipping.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    protected function process($street, $city, $country, $email, $firstname, $lastname, $shipping = false) {
        $em = $this->getDoctrine()
                ->getManager();
        $address = new \Bookshop\BookshopBundle\Entity\Address();
        $em->persist($address);
        $address->init($street, $city, $country, $email, $firstname, $lastname);
        $order = $em->getRepository('BookshopBookshopBundle:Order')->getOrderForUser($this->getUser());
        
        if (sizeof($order) == 0) {
            $order = new \Bookshop\BookshopBundle\Entity\Order();
            $order->setUser($this->getUser());
            $cart=$em->getRepository('BookshopBookshopBundle:Cart')->getCartForUser($this->getUser());
            $order->setCart($cart);
            $em->persist($order);
        } 
        
        if ($shipping) {
            $order->setShippingAddress($address);
        } else {
            $order->setBillingAddress($address);
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
            $shipping_method = $em->getRepository('BookshopBookshopBundle:ShippingMethod')->getShippingMethod($_POST['payment']['method']);
            $order->setShippingMethod($shipping_method);
        } else {
            $payment_method = $em->getRepository('BookshopBookshopBundle:PaymentMethod')->getPaymentMethod($_POST['payment']['method']);
            $order->setPaymentMethod($payment_method);
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

    public function successAction() {
        $this->shippingandbilling();
        
        return $this->render("BookshopBookshopBundle:Page:Success.html.twig", array());
    }

}

