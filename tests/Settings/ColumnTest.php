<?php

namespace Tests\Html;

use \atsanna\DataTables\Settings\Column;
use \Tests\Support\TestCase;

/**
 * @internal
 */
final class ColumnTest extends TestCase
{
    protected $column;

    protected function setUp(): void
    {
        parent::setUp();

        $this->column = new Column();
    }

    public function testSetSearchable(): void
    {
        $this->assertSame('false',  $this->column->getSearchable());

        $this->column->setSearchable(true);
        $this->assertSame('true',  $this->column->getSearchable());

        $this->column->setSearchable(false);
        $this->assertSame('false',  $this->column->getSearchable());
    }

    public function testSetName(): void
    {
        $this->assertSame('',  $this->column->getName());

        $this->column->setName('Test');
        $this->assertSame('Test',  $this->column->getName());

    }

    public function testSetTitle(): void
    {
        $this->assertSame('',  $this->column->getTitle());

        $this->column->setTitle('Test');
        $this->assertSame('Test',  $this->column->getTitle());

    }

    public function testSetVisible(): void
    {
        $this->assertSame('true',  $this->column->getVisible());

        $this->column->setVisible(false);
        $this->assertSame('false',  $this->column->getVisible());

        $this->column->setVisible(true);
        $this->assertSame('true',  $this->column->getVisible());
    }

    public function testSetRender(): void
    {
        $this->assertSame('',  $this->column->getRender());

        $this->column->setRender('Test');
        $this->assertSame('Test',  $this->column->getRender());
    }

}
