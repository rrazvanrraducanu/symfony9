<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class MoveController extends Controller
{
    /**
     * @Route("/move", name="move")
     */
    public function index(Request $request)
    {
        $data=[];
        $var='patru';
        $form=$this->createFormBuilder()
            ->add('nume1', TextType::class, array('attr'=>array('size'=>'30','placeholder'=>'bau bau'),'label'=>false,'required'=>false))
            ->add('submit1', SubmitType::class,array('label'=>'Submit'))
            ->add('nume2', TextareaType::class, array('attr'=>array('size'=>'30'),'label'=>false,'required' => false))
            ->add('submit2', SubmitType::class,array('label'=>'Submit'))
            ->add('submit3', SubmitType::class,array('label'=>'Submit'))
            ->add('nume3', TextType::class, array('attr'=>array('size'=>'30'),'label'=>false,'required'=>false))
            ->getForm();
        $form->handleRequest($request);
        $data['head']="<h1>Input your name</h1>";
        $data['form']=$form->createView();

        if($form->isSubmitted()){
            if(null!==$form->get('nume1')->getData()){
                $data['value1']='';
                $data['value2']=$form->get('nume1')->getData();
                $data['value3']='';
                $data['value4']='';
            } else
                if(null!==$form->get('nume2')->getData()){
                    $data['value1']='';
                    $data['value2']='';
                    $data['value3']=$form->get('nume2')->getData();;
                    $data['value4']='';
                } else
                    if(isset($_POST['drop'])){
                        $data['value1']='';
                        $data['value2']='';
                        $data['value3']='';
                        $data['value4']=$_POST['drop'];
                    }

        }else {
            $data['value1']='';
            $data['value2']='';
            $data['value3']='';
            $data['value4']='';
        }
        return $this->render('move/index.html.twig', $data);
    }
}
