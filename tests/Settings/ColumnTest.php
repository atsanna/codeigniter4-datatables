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
        $this->assertSame('false',  $this->configuration->getSearchable());

        $this->configuration->setSearchable(true);
        $this->assertSame('true',  $this->configuration->getSearchable());

        $this->configuration->setSearchable(false);
        $this->assertSame('false',  $this->configuration->getSearchable());
    }

    public function testSetName(): void
    {
        $this->assertSame('',  $this->configuration->getName());

        $this->configuration->setName('Test');
        $this->assertSame('Test',  $this->configuration->getName());

    }

    public function testSetTitle(): void
    {
        $this->assertSame('',  $this->configuration->getTitle());

        $this->configuration->setTitle('Test');
        $this->assertSame('Test',  $this->configuration->getTitle());

    }

    public function testSetVisible(): void
    {
        $this->assertSame('true',  $this->configuration->getVisible());

        $this->configuration->setVisible(false);
        $this->assertSame('false',  $this->configuration->getVisible());

        $this->configuration->setVisible(true);
        $this->assertSame('true',  $this->configuration->getVisible());
    }

}
