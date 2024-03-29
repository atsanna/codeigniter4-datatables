<?php

namespace Tests\Settings;

use atsanna\DataTables\Settings\Column;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class ColumnTest extends TestCase
{
    protected Column $column;

    protected function setUp(): void
    {
        parent::setUp();

        $config['name']       = 'name';
        $config['searchable'] = true;
        $config['visible']    = true;
        $config['title']      = 'title';

        $this->column = new Column($config);
    }

    public function testSetSearchable(): void
    {
        $this->assertSame('true', $this->column->getSearchable());

        $this->column->setSearchable(true);
        $this->assertSame('true', $this->column->getSearchable());

        $this->column->setSearchable(false);
        $this->assertSame('false', $this->column->getSearchable());
    }

    public function testSetName(): void
    {
        $this->assertSame('name', $this->column->getName());

        $this->column->setName('Test');
        $this->assertSame('Test', $this->column->getName());
    }

    public function testSetTitle(): void
    {
        $this->assertSame('title', $this->column->getTitle());

        $this->column->setTitle('Test');
        $this->assertSame('Test', $this->column->getTitle());
    }

    public function testSetVisible(): void
    {
        $this->assertSame('true', $this->column->getVisible());

        $this->column->setVisible(false);
        $this->assertSame('false', $this->column->getVisible());

        $this->column->setVisible(true);
        $this->assertSame('true', $this->column->getVisible());
    }

    public function testSetRender(): void
    {
        $this->assertSame('', $this->column->getRender());

        $this->column->setRender('Test');
        $this->assertSame('Test', $this->column->getRender());
    }
}
