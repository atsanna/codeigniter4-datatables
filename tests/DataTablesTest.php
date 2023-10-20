<?php

namespace Tests;

use atsanna\DataTables\DataTables;
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

    public function testBoot(): void
    {
        $this->assertIsObject($this->dataTables->boot());
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
