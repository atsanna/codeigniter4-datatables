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

include_once __DIR__ .'/Common.php';
include_once __DIR__ .'/Config/Constants.php';

use atsanna\DataTables\Html\Table;
use atsanna\DataTables\Settings\Column;
use atsanna\DataTables\Javascript\DataTablesScript;

class DataTables
{

    protected $table;
    protected $dataTablesScript;

    /**
     * Sets up initialize module and return this object.
     */
    public function boot(Model $model = null): DataTables
    {
        $this->dataTablesScript = new DataTablesScript();
        $this->table = new Table($model);

        return $this;
    }

    /*
    * Return Table Object
    */
    public function table(){
        return $this->table;
    }

    /*
    * Return DataTablesScript Object
    */
    public function dataTablesScript(){
        return $this->dataTablesScript;
    }

    /*
    * Return DataTables Version
    */
    public function getVersion() {
        return DATATABLES_VERSION;
    }
    
}