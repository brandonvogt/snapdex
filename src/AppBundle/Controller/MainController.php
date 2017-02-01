<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Pokemon;
use AppBundle\Entity\Picture;
//use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\PictureType;

class MainController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        if ($this->getUser()) {
            
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
                'SELECT po, pi
                 FROM AppBundle:Pokemon po
                 LEFT JOIN po.pictures pi
                 WITH pi.user_id = :uid
                 WHERE po.id < 16
                 ORDER BY po.id ASC'
        );
        $query->setParameter('uid', $this->getUser()->getId());

        $pokemon = $query->getResult();
        
        return $this->render('main/main.html.twig', [
            'pokemon' => $pokemon
            ]);
        }
        else {
            return $this->redirect('login');
        }
    }
    /**
     * @Route("/mydex")
     */
    public function myDexAction()
    {
        if ($this->getUser()) {
            
        $user = $this->getUser();
        
        return $this->render('main/main.html.twig');
        }
        else {
            return $this->redirect('login');
        }
    }
    /**
     * @Route("/mydex/getpokes/{offset}", name="get_pokes")
     */
    public function getPokesAction($offset = 0)
    {
        $max = 15;
        
        if ($this->getUser()) {
            
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
                'SELECT po, pi
                 FROM AppBundle:Pokemon po
                 LEFT JOIN po.pictures pi
                 WITH pi.user_id = :uid
                 ORDER BY po.id ASC'
                )
                ->setMaxResults($max)
                ->setFirstResult($offset);
        $query->setParameter('uid', $this->getUser()->getId());
        
        $pokemon = $query->getResult();
        
        return $this->render('main/mydex.html.twig', [
            'pokemon' => $pokemon
            ]);
        }
        else {
            return $this->redirect('login');
        }
    }
    
    
    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        return new Response('<html><body>Admin page!</body></html>');
    }
}