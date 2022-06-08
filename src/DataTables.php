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

class DataTables
{

    /**
     * Sets up initialize module.
     */
    public function boot()
    {
        
    }

    /*
    * Return DataTables Version
    */
    public function getVersion() {
        return DATATABLES_VERSION;
    }
    
}