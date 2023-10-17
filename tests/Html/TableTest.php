<?php

namespace Tests\Html;

use atsanna\DataTables\Html\Table;
use atsanna\DataTables\Settings\Configuration;
use CodeIgniter\Shield\Models\UserModel;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class TableTest extends TestCase
{
    protected Table $table;
    protected Configuration $tableConfiguration;

    protected function setUp(): void
    {
        parent::setUp();

        $this->table              = new Table();
        $this->tableConfiguration = $this->table->getConfiguration();
    }

    public function testGetModelIsNull(): void
    {
        $tableModel = $this->table->getModel() ?? null;

        $this->assertNull(
            $tableModel,
            'model is null or not'
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
        $this->assertInstanceOf(Configuration::class, $this->table->getConfiguration());
    }

    public function testRenderString(): void
    {
        $model = new UserModel();
        $this->table->setModel($model);

        $data = [
            'fields'          => $this->table->getModel()->__get('allowedFields'),
            'localize'        => 'User',
            'class'           => 'table table-bordered table-hover table-striped',
            'style'           => '',
            'id'              => $this->table->getModel()->__get('table') . '_' . time(),
            'data-id'         => '',
            'data-table_name' => $this->table->getModel()->__get('table'),
            'footer'          => true,
        ];

        $this->assertIsString(
            $this->table->render($data),
            'return is string'
        );
    }

    /* public function testFetch_data(): void
     {
         $model = new UserModel();
         $this->table->setModel($model);

         $this->assertIsArray($this->table->fetch_data());
     }*/

    /* public function testInsert(): void
     {
         $this->assertStringContainsString('insert', $this->table->insert());
     }

     public function testUpdate(): void
     {
         $this->assertStringContainsString('update', $this->table->update());
     }

     public function testDelete(): void
     {
         $this->assertStringContainsString('delete', $this->table->delete());
     }*/
}
