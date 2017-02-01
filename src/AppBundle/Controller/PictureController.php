<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Picture;

use AppBundle\Form\PictureType;

class PictureController extends Controller
{
    /**
     * @Route("/gallery")
     */
    public function galleryAction()
    {
//        $repository = $this->getDoctrine()
//            ->getRepository('AppBundle:Pokemon');
//        
//        $query = $repository->createQueryBuilder('p')
//            ->where('p.id < :pid')
//            ->setParameter('pid', '16')
//            ->orderBy('p.id', 'ASC')
//            ->getQuery();
//
//        $pokemon = $query->getResult();
//        
//        return $this->render('main/show.html.twig', [
//            'pokemon' => $pokemon
//            ]);
    }
    /**
     * @Route("/picture/new/{poke_id}", name="new_pic")
     */
    public function newAction(Request $request, $poke_id) {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Unable to access this page!');
        
        $pic = new Picture();
        $pokemon_repo = $this->getDoctrine()->getRepository('AppBundle:Pokemon');
        $pokemon = $pokemon_repo->find($poke_id);
        
        $form = $this->createForm(PictureType::class, $pic);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $request->isXmlHttpRequest()) {
            
            $pic = $form->getData();
            
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $pic->getGuid();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('pic_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $pic->setGuid($fileName);

            $pic->setPokemon($pokemon);
            $pic->setUser($this->getUser());
            $pic->setVoteCount(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($pic);
            $em->flush();
            $response['success'] = true;
            return new JsonResponse( $response );
        }
        else {
        
        
        return $this->render('main/new.html.twig', array(
            'form' => $form->createView(),
            'pokemon' => $pokemon,
        ));
            }
        }
}