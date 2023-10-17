<?php

/**
 * This file is part of DataTables.
 *
 * (c) Antonio Sanna <atsanna@tiscali.it>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace atsanna\DataTables;

include_once __DIR__ . '/Config/Constants.php';

use CodeIgniter\Model;

class DataTables
{
    protected object $_table;
    protected object $_dataTablesScript;

    /**
     * Sets up initialize module and return this object.
     */
    public function boot(?Model $model = null): DataTables
    {
        $this->_dataTablesScript = $dt = service('dataTablesScript');
        $this->_table            = service('table');

        if ($model !== null) {
            $this->_table->setModel($model);
        }

        return $this;
    }

    // Return Table Object
    public function table(): object
    {
        return $this->_table;
    }

    // Return DataTablesScript Object
    public function dataTablesScript(): object
    {
        return $this->_dataTablesScript;
    }

    // Return DataTables Version
    public function getVersion(): string
    {
        return DATATABLES_VERSION;
    }
}
