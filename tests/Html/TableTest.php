<?php

namespace Tests\Html;

use CodeIgniter\Shield\Models\UserModel;
use atsanna\DataTables\Html\Table;
use Tests\Support\TestCase;

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
        $this->assertNull( 
            $this->table->getModel(), 
            "model is null or not"
        ); 
    }

    public function testGetModelisNotNull(): void
    {
		$model = new UserModel();
        $this->table->setModel($model);

        $this->assertInstanceOf("UserModel",$this->table->getModel());

        $this->assertInstanceOf("\\CodeIgniter\\Shield\\Models\\UserModel", $this->table->getModel());

        $this->assertInstanceOf(UserModel::class, $this->table->getModel());

    }
}