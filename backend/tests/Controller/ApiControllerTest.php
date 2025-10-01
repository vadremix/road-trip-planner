<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class ApiControllerTest extends WebTestCase
{
    private $client;
    private $jwtManager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->jwtManager = static::getContainer()->get(JWTTokenManagerInterface::class);
    }

    public function testPublicRoute()
    {
        $this->client->request('GET', '/api/public');
        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonString('{"message":"This is a public route."}', $this->client->getResponse()->getContent());
    }

    public function testProtectedRouteWithoutToken()
    {
        $this->client->request('GET', '/api/protected');
        $this->assertResponseStatusCodeSame(401);
    }

    public function testProtectedRouteWithToken()
    {
        $user = new \App\Security\InMemoryUser('testuser', null, ['ROLE_USER']);
        $token = $this->jwtManager->create($user);

        $this->client->request('GET', '/api/protected', [], [], ['HTTP_AUTHORIZATION' => 'Bearer ' . $token]);
        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonString('{"message":"This is a protected route."}', $this->client->getResponse()->getContent());
    }
}
