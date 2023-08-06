<?php

namespace App\Controller\Security;

use App\Form\LoginForm;
use App\Form\RegistrationForm;
use App\Helpers\User\UserSaver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'security_login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirect($this->generateUrl('app_index'));
        }

        $loginForm = $this->createForm(LoginForm::class);

        return $this->render('security/login.html.twig', [
            'loginForm' => $loginForm->createView(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/register', name: 'security_register', methods: ['GET', 'POST'])]
    public function registration(Request $request, UserSaver $userSaver): Response
    {
        if ($this->getUser()) {
            return $this->redirect($this->generateUrl('app_index'));
        }

        $registrationForm = $this->createForm(RegistrationForm::class);
        $registrationForm->handleRequest($request);

        if ($registrationForm->isSubmitted() && $registrationForm->isValid()) {
            $userSaver->save($registrationForm->getData());

            return $this->redirect($this->generateUrl('security_login'));
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $registrationForm->createView(),
        ]);
    }
}