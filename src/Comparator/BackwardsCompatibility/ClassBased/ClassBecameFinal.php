<?php

declare(strict_types=1);

namespace Roave\ApiCompare\Comparator\BackwardsCompatibility\ClassBased;

use Roave\ApiCompare\Change;
use Roave\ApiCompare\Changes;
use Roave\BetterReflection\Reflection\ReflectionClass;
use function sprintf;

final class ClassBecameFinal implements ClassBased
{
    public function compare(ReflectionClass $fromClass, ReflectionClass $toClass) : Changes
    {
        if ($fromClass->isFinal()) {
            return Changes::new();
        }

        if (! $toClass->isFinal()) {
            return Changes::new();
        }

        return Changes::fromArray([Change::changed(
            sprintf('Class %s became final', $fromClass->getName()),
            true
        ),
        ]);
    }
}
