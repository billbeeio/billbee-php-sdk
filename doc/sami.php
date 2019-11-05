<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

use Sami\Sami;
use Symfony\Component\Finder\Finder;
use Sami\Parser\Filter\FilterInterface;
use Sami\Reflection\MethodReflection;
use Sami\Reflection\PropertyReflection;
use Sami\Reflection\ClassReflection;

$iterator = Finder::create()
                  ->files()
                  ->name('*.php')
                  ->exclude('vendor')
                  ->exclude('tests')
                  ->in(__DIR__ . '/../src');

class IncludeProtectedFilter implements FilterInterface
{
    public function acceptClass(ClassReflection $class)
    {
        return true;
    }

    public function acceptMethod(MethodReflection $method)
    {
        return !$method->isPrivate() && !$method->isProtected();
    }

    public function acceptProperty(PropertyReflection $property)
    {
        return !$property->isPrivate() && !$property->isProtected();
    }
}

$sami = new Sami($iterator, array(
    'build_dir' => __DIR__ . '/generated',
    'cache_dir' => __DIR__ . '/cache'
));

$sami['filter'] = function () {
    return new IncludeProtectedFilter();
};

return $sami;