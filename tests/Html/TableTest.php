<?php

namespace Tests\Html;

use \CodeIgniter\Shield\Models\UserModel;
use \atsanna\DataTables\Html\Table;
use \atsanna\DataTables\Settings\Configuration;
use \Tests\Support\TestCase;

/**
 * @internal
 */
final class TableTest extends TestCase
{
    protected $table;

    protected function setUp(): void
    {
        parent::setUp();

        $this->table = new Table();
    }

    public function testGetModelisNull(): void
    {
        $tableModel = $this->table->getModel() ?? null;

        $this->assertNull( 
            $tableModel, 
            "model is null or not"
        ); 
    }

    public function testGetModelInstanceOf(): void
    {
		$model = new UserModel();
        $this->table->setModel($model);

        $tableModel = $this->table->getModel() ?? null;

        $this->assertInstanceOf(UserModel::class, $tableModel);

    }

    public function testGetConfigurationInstanceOf(): void
    {

        $tableConfiguration = $this->table->getConfiguration() ?? null;

        $this->assertInstanceOf(Configuration::class, $tableConfiguration);

    }
}