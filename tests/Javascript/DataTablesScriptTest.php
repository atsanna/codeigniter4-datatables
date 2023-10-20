<?php

namespace Tests\Html;

use atsanna\DataTables\Javascript\DataTablesScript;
use atsanna\DataTables\Settings\Column;
use atsanna\DataTables\Settings\Configuration;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class DataTablesScriptTest extends TestCase
{
    protected $dataTablesScript;
    protected $configuration;
    protected $columns;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataTablesScript = new DataTablesScript();
        $this->configuration    = new Configuration();

        $column = new Column();
        $column->setName('test')
            ->setTitle('test')
            ->setVisible(true)
            ->setSearchable(true)
            ->setRender('');

        $this->columns[] = $column;
        $this->configuration->setColumns((array) $this->columns);
    }

    public function testGetJavascript(): void
    {
        $this->assertStringContainsString('script', $this->dataTablesScript->getJavascript());
    }

    public function testGetDocumentReady(): void
    {
        $this->configuration->setDataSource('/');
        $this->assertStringContainsString('var', $this->dataTablesScript->getDocumentReady('test', $this->configuration));
        $this->configuration->setServerSide(false);
        $this->assertStringContainsString('var', $this->dataTablesScript->getDocumentReady('test', $this->configuration));
    }
}
