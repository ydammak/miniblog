<?php
declare(strict_types=1);

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class JWTCreatedListener
{

    private Security $security;
    //private UserInterface $user;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $payload = $event->getData();
        $payload['createdAt'] = $this->security->getUser()->getCreatedAT();
        //$payload['createdAt'] = $this->user->getCreatedAT();

        $event->setData($payload);
    }
}