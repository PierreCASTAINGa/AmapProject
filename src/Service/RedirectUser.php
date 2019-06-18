<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;



/**
 * Class RedirectUser
 *
 * @package AppBundle\AppListener
 */
class RedirectUser implements AuthenticationSuccessHandlerInterface
{
    private $router;

    /**
     * RedirectUser constructor.
     *
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request        $request
     *
     * @param TokenInterface $token
     *
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $result = $token->getRoles();
        
        if (in_array('ROLE_USER', $result)) {
        
            // c'est un amapien/admin : on le redirige vers l'espace amapien/admin
            $redirection = new RedirectResponse($this->router->generate('paniercategorie_index'));
        } 
        else {
            $maVariable = 'Pierre is not logged';
            $redirection = '<html><body>'.$maVariable.'</body></html>';
        }


        return $redirection;
    }
}