<?php

namespace Tests;

use atsanna\DataTables\DataTables;
use CodeIgniter\Shield\Models\UserModel;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class DataTablesTest extends TestCase
{
    protected DataTables $dataTables;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataTables = new DataTables();
        $this->dataTables->boot();
    }

    public function testBoot1(): void
    {
        $this->assertIsObject($this->dataTables->boot());
    }

    public function testBoot2(): void
    {
        $model = new UserModel();
        $this->assertIsObject($this->dataTables->boot($model));
    }

    public function testTable(): void
    {
        $this->assertIsObject($this->dataTables->table());
    }

    public function testdataTablesScript(): void
    {
        $this->assertIsObject($this->dataTables->dataTablesScript());
    }

    public function testGetVersion(): void
    {
        $this->assertStringContainsString('1.0.0-dev', $this->dataTables->getVersion());
    }
}
