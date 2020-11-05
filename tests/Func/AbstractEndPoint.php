<?php
declare(strict_types=1);

namespace App\Test\Func;

use App\Entity\User;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractEndPoint extends WebTestCase
{

    private array $serverInforamtions = ['ACCEPT'=>'application/json','CONTENT_TYPE'=>'application/json'];
    
    public function getResponseFromRequest(string $method, string $uri, string $payload= ''): Response
    {
        $client = self::createClient();

        $client->request(
            $method,
            $uri. '.json',
            [],
            [],
            $this->serverInforamtions,
            $payload
        );

        return $client->getResponse();
    }
}