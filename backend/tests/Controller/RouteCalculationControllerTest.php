<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class RouteCalculationControllerTest extends WebTestCase
{
    public function testCalculateRoute(): void
    {
        // todo: stub

        $client = static::createClient();
        $client->request('POST', '/api/route');

        self::assertResponseIsSuccessful();
    }

    public function testCalculateRouteWithMissingFields(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/route',  [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'start' => 'Amsterdam'
        ]));

        $this->assertResponseStatusCodeSame(400);
    }
}
