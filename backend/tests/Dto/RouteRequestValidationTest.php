<?php

namespace App\Tests\Dto;

use App\Dto\GeoPointDto;
use App\Dto\RouteRequestDto;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RouteRequestValidationTest extends KernelTestCase
{
    public function testValidRouteRequestPassesValidation(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $dto = new RouteRequestDto();
        $dto->range = 300;
        $dto->start = new GeoPointDto();
        $dto->start->latitude = 52.52;
        $dto->start->longitude = 53.41;
        $dto->end = new GeoPointDto();
        $dto->end->latitude = 53.41;
        $dto->end->longitude = 53.41;

        $errors = $validator->validate($dto);
        $this->assertCount(0, $errors);
    }

    public function testInvalidRouteRequestFailsValidation(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $invalidLatitude = 900;

        $dto = new RouteRequestDto();
        $dto->range = 300;
        $dto->start = new GeoPointDto();
        $dto->start->latitude = $invalidLatitude;
        $dto->start->longitude = 53.41;
        $dto->end = new GeoPointDto();
        $dto->end->latitude = 53.41;
        $dto->end->longitude = 53.41;

        $errors = $validator->validate($dto);
        $this->assertGreaterThan(0, count($errors));
    }
}
