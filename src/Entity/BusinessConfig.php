<?php
declare(strict_types=1);

namespace App\Entity;

class BusinessConfig
{
    public const TIME_ZONE = 'Africa/Lagos';

    public static function getCurrentTime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('now', new \DateTimeZone(self::TIME_ZONE));
    }
}
