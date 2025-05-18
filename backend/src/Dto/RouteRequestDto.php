<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class RouteRequestDto
{
    #[Assert\NotNull]
    #[Assert\Type('float')]
    #[Assert\Positive]
    public float $range;

    #[Assert\NotNull]
    #[Assert\Valid]
    public GeoPointDto $start;

    #[Assert\NotNull]
    #[Assert\Valid]
    public GeoPointDto $end;
}
