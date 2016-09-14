<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Region;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $region = new Region();
        $region->setRName('Keyboard');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($region);
        //$em->flush();
        
        $form = $this->createFormBuilder($region)
            ->add(
                    'rName', 
                    TextType::class,
                    array(
                        'label'    =>  'region',
                        'attr'      =>  array(
                                                'class' =>  'input_form_class',
                                                'name' =>  'idsdsd'
                                            )
                    )
            )
            ->add('save', ButtonType::class, array(
                 'attr' => array('class' => 'save'),
            ))
            ->getForm();
        
        if ($request->getMethod() == 'POST') 
        {
            $region_name    =   $request->request->get('form');
            $r_name = $region_name['rName'];          
        }
        
        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..')
        ));
    }
    
    /**
     * @Route("/ajax", name="ajax")
     */
    public function ajaxAction(Request $request)
    {    
        if ($request->getMethod() == 'POST') 
        {
            $region_name    =   $request->request->get('form');
            $r_name = $region_name['rName'];          
            
            $region = new Region();
        
            $em = $this->getDoctrine()->getManager();
            $qb = $em->createQueryBuilder();
            $qb->select(array('u.rName')) // string 'u' is converted to array internally
                    ->from('AppBundle:region', 'u')
                    ->where(
                        $qb->expr()->like('u.rName', ':city')
                    )
                    ->setParameter('city', 'MOSCOW');
            
            $result =   ($qb->getQuery()->getResult());
            $result  = reset($result);
            $result = $result['rName'];
        }
         
            $response = new JsonResponse();
            $response->setData(
                    array(
                    'city'=>$result
                    )
            );
           // $response->setContent($result);
           // $response->headers->set('Content-Type', 'application/json');
/*
            $response->setCallback(function () {
             //  var_dump('Hello World');
             //   flush();
               sleep(2);
                //var_dump('Hello World');
               // flush();
            });
            
   */         
            return $response;
    }    
}
