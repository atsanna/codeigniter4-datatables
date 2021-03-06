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

use atsanna\DataTables\DataTables;
use atsanna\DataTables\Html\Table;
use atsanna\DataTables\Javascript\DataTablesScript;
use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    /**
     * Core utility class for DataTables's system.
     *
     * @return DataTables|mixed
     */
    public static function datatables(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('datatables');
        }

        return new DataTables();
    }

    /**
     * @return DataTablesScript|mixed
     */
    public static function dataTablesScript(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('dataTablesScript');
        }

        return new DataTablesScript();
    }

    /**
     * @return mixed|Table
     */
    public static function table(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('table');
        }

        return new Table();
    }
}
