<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class RouteCalculationControllerTest extends WebTestCase
{
    public function testCalculateRoute(): void
    {
        $client = static::createClient();
        $client->request(
            'POST', '/api/route', [], [], ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'start' => [
                    'latitude' => 54.24,
                    'longitude' => 54.24
                ],
                'end' => [
                    'latitude' => 50.24,
                    'longitude' => 54.24
                ],
                'range' => 300
            ])
        );

        self::assertResponseIsSuccessful();
    }

    public function testCalculateRouteWithInvalidInput(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/route',  [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'start' => 'Amsterdam'
        ]));

        $this->assertResponseStatusCodeSame(422);
    }
}
