<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


/**
 * @method static static admin()
 * @method static static presenter()
 * @method static static participant()
 * @method static static reviewer()
 */
final class PositionType extends Enum
{
    const admin = 1;
    const presenter = 2;
    const participant = 3;
    const reviewer = 4;
}