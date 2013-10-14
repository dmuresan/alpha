<?php

namespace Bookshop\BookshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bookshop\BookshopBundle\Entity\CartItem;
use Bookshop\BookshopBundle\Entity\Cart;
class CartController extends Controller {

    public function cartPageAction() {
        $em = $this->getDoctrine()
                ->getManager();
        $cart = $this->init($em);
        return $this->render('BookshopBookshopBundle:Page:cart.html.twig', array('cart' => $cart));
    }

    public function addAction() {

        $quantity = 1;
        $em = $this->getDoctrine()->getManager();
        if (isset($_POST['quantity'])) {
            $quantity = $_POST['quantity'];
        }
        $cart = $this->init($em);
        $cartItem = new CartItem();
        $cartItem = $cartItem->newItem($_POST['id'], $_POST['price'], $_POST['title'], $cart, $quantity);
        if (!$this->updateAction($quantity)) {
            $cart->addCartItem($cartItem);
        }

        $em->flush();
        return $this->redirect($this->getRequest()->headers->get("referer"));
    }

    public function removeAction() {
        $i = 0;
        $em = $this->getDoctrine()->getManager();
        $cart = $this->init($em);
        foreach ($cart->getCartItems() as $item) {
            $i++;
            if (isset($_POST['update_cart_action']) || $item->getProductId() == $_POST['id'][$i]) {
                $cart->removeCartItem($item);
                $item->setCart(null);
                $em->flush();
                
            }
        }
        return $this->redirect($this->getRequest()->headers->get("referer"));
    }

    public function updateAction($add = false) {
        $i = 0;
        $em = $this->getDoctrine()->getManager();
        $cart = $this->init($em);
        foreach ($cart->getCartItems() as $item) {
            $i++;
            if ($add == false) {
                if ($item->getProductId() == $_POST['id'][$i]) {
                    $item->setQuantity($_POST['quantity'][$i]);
                    $em->flush();
                    return $this->redirect($this->getRequest()->headers->get("referer"));
                }
            } elseif ($item->getProductId() == $_POST['id']) {
                $item->setQuantity($item->getQuantity() + $add);
                $em->flush();
                return true;
            }
            
        }
    }

    protected function init($em) {
        $cart = $em->getRepository('BookshopBookshopBundle:Cart')->getCartForUser($this->getUser());
        if(sizeof($cart)!=0){
        $cart = $cart[0];
        }elseif(isset($_SESSION['cart'])){
           $cart=$_SESSION['cart'];
        }
        else{
             $_SESSION['cart']=new Cart();
             $cart=$_SESSION['cart'];
        }  
        return $cart;
    }

    public function processFormAction() {
        
        if (isset($_POST['update_cart_action'])) {
            if ($_POST['update_cart_action'] == 'update_qty') {
                return $this->updateAction();
            } else {
                return $this->removeAction();
            }
        }
        if (isset($_POST['remove'])) {
            return $this->removeAction();
        }
    }

}