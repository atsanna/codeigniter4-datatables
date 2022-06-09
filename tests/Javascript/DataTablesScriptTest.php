<?php

namespace Tests\Html;

use atsanna\DataTables\Javascript\DataTablesScript;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class DataTablesScriptTest extends TestCase
{
    protected $dataTablesScript;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataTablesScript = new DataTablesScript();
    }

    public function testGetJavascript(): void
    {
        $this->assertStringContainsString('script', $this->dataTablesScript->getJavascript());
    }
}
