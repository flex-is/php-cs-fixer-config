<?php

declare(strict_types=1);

/*
 * This file is part of configuration package for PHP CS Fixer.
 *
 * (c) Martin Miskovic <miskovic.martin@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use Flexis\PhpCsFixer\ConfigFactory;
use Flexis\PhpCsFixer\RuleSet\Php81;
use PhpCsFixer\Finder;

$finder = new Finder();
$finder->in(__DIR__);
$finder->append([
    '.php-cs-fixer.php',
    '.php-cs-fixer.dist.php',
]);

// pick a configuration based on php version
$ruleSet = new Php81();
$ruleSet->setHeader(<<<'EOF'
    This file is part of configuration package for PHP CS Fixer.

    (c) Martin Miskovic <miskovic.martin@gmail.com>

    For the full copyright and license information, please view
    the LICENSE file that was distributed with this source code.
    EOF);

$config = ConfigFactory::fromRuleSet($ruleSet);
$config->setFinder($finder);
$config->setCacheFile('.php-cs-fixer.cache');

return $config;
