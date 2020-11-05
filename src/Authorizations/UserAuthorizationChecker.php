<?php
declare(strict_types=1);

namespace App\Authorizations;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;


class UserAuthorizationChecker
{
    private array $methodAllowed=[
        Request::METHOD_PUT,
        Request::METHOD_PATCH,
        Request::METHOD_DELETE
    ]; 

    private Security $security;
    private ?UserInterface $user;

    public function __construct(Security $security)
    {
        $this->user = $security->getUser();
    }

    public function check(UserInterface $user , $method): void 
    {
        $this->isAuthenticated();
        if($this->isMethodAllowed($method) && $user->getId() !== $this->user->getId())
        {
            $errorMessage ="It's not your resource";
            throw new UnauthorizedHttpException($errorMessage,$errorMessage);
            
        }
    }

    public function isAuthenticated():void 
    {
        if(null === $this->user){
            $errorMessage = "you are not autheticated";
            throw new UnauthorizedHttpException($errorMessage , $errorMessage);
        }
    }
    public function isMethodAllowed(string $method): bool 
    {
        return in_array($method, $this->methodAllowed, true);

    }
}