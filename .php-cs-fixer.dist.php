<?php

/**
 * This file is part of DataTables.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use CodeIgniter\CodingStandard\CodeIgniter4;
use Nexus\CsConfig\Factory;
use Nexus\CsConfig\Fixer\Comment\NoCodeSeparatorCommentFixer;
// use Nexus\CsConfig\Fixer\Comment\SpaceAfterCommentStartFixer;
use Nexus\CsConfig\FixerGenerator;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->files()
    ->in([
        __DIR__ . '/src/',
        __DIR__ . '/tests/',
    ])
    ->exclude('build')
    ->append([
        __FILE__,
        __DIR__ . '/.no-header.php-cs-fixer.dist.php',
        __DIR__ . '/rector.php',
        __DIR__ . '/spark',
    ]);

$overrides = [
    'ordered_class_elements' => [
        'order' => [
            'use_trait',
            'constant',
            'property',
            'method',
        ],
        'sort_algorithm' => 'none',
    ],
];

$options = [
    'finder'       => $finder,
    'cacheFile'    => 'build/.php-cs-fixer.cache',
    'customFixers' => FixerGenerator::create('vendor/nexusphp/cs-config/src/Fixer', 'Nexus\\CsConfig\\Fixer'),
    'customRules'  => [
        NoCodeSeparatorCommentFixer::name() => true,
        // SpaceAfterCommentStartFixer::name() => true,
    ],
];

return Factory::create(new CodeIgniter4(), $overrides, $options)->forProjects(
    'DataTables',
    'Antonio Sanna',
    'atsanna@tiscali.it'
);
