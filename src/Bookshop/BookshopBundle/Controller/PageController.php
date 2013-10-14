<?php

namespace Bookshop\BookshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bookshop\BookshopBundle\Entity\Cart;
class PageController extends Controller {

    public function indexAction() {
       
        var_dump($this->GetUser());
        $em = $this->getDoctrine()
                ->getManager();

        $products = $em->getRepository('BookshopBookshopBundle:Product')
                ->getLatestProducts(6);


        return $this->render('BookshopBookshopBundle:Page:index.html.twig', array(
                    'products' => $products
        ));
    }

    public function categoryPageAction($cid) {
        $em = $this->getDoctrine()
                ->getManager();

        $category = $em->getRepository('BookshopBookshopBundle:Category')->find($cid);
        $products = $category->getProducts();
        $cart=$em->getRepository('BookshopBookshopBundle:Cart')->getCartForUser($this->getUser());
        if(sizeof($cart)!=0){
            $cart=$cart[0];
        }
        elseif(isset($_SESSION['cart'])){
            $cart=$_SESSION['cart'];
        }
        else{
            $_SESSION['cart']=new Cart();
            $cart=$_SESSION['cart'];
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $products, $this->get('request')->query->get('page', 1)/* page number */, 3/* limit per page */
        );

        return $this->render('BookshopBookshopBundle:Page:categoryPage.html.twig', array(
                    'pagination' => $pagination,'cart'=>$cart
        ));
    }



}
