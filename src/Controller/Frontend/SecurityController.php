<?php

namespace App\Controller\Frontend;

use App\Entity\User;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function sinscrire(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User;
        
        $form = $this->createForm(InscriptionType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('login');

        }

        return $this->render('frontend/security/sinscrire.html.twig', [
            'section_title' => 'Veuillez vous inscrire',
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/login", name="login")
     */
        public function login(AuthenticationUtils $authenticationUtils) {

            $error = $authenticationUtils->getLastAuthenticationError();
            $lastUsername = $authenticationUtils->getLastUsername();

            return $this->render('frontend/security/sidentifier.html.twig', [
                'section_title' => 'Veuillez vous identifier',
                'error' => $error,
                'lastUsername' => $lastUsername 
             ]);
        }
    
        /**
         * @route("/getout", name="secured_logout")
         */
        public function logout()
        {
        
        }
}
