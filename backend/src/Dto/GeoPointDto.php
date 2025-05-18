<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class GeoPointDto
{
    #[Assert\NotNull]
    #[Assert\Type('float')]
    #[Assert\Range(min: -90, max: 90)]
    public float $latitude;

    #[Assert\NotNull]
    #[Assert\Type('float')]
    #[Assert\Range(min: -180, max: 180)]
    public float $longitude;
}
