<?php
declare(strict_types=1);

namespace App\Test\Func;

use App\Entity\User;
use App\Entity\Article;
use App\tests\Func\AbstractEndPoint;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class UserTest 
{

    public function testGetUsers(): void
    {
        $response = $this->getResponseFromRequest(Request::METHOD_GET, 'api/users');
        $responseContent = $response->getContent();
        $responceDecoded = json_decode($responseContent);

        self::assertEquals(Response::HTTP_OK,$response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responceDecoded);

    }
}
