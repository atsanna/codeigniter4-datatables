<?php

/**
 * This file is part of DataTables.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\DataTables\Config;

use CodeIgniter\Config\BaseConfig;

class DataTables extends BaseConfig
{
    public $views = [
        'filter_list' => 'DataTables\Views\_filter_list',
    ];
}
