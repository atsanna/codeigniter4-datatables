<?php

namespace Tests\Html;

use \atsanna\DataTables\Settings\Configuration;
use \Tests\Support\TestCase;

/**
 * @internal
 */
final class ConfigurationTest extends TestCase
{
    protected $configuration;

    protected function setUp(): void
    {
        parent::setUp();

        $this->configuration = new Configuration();
    }

    public function testSetAutoWidth(): void
    {
        $this->assertSame('false',  $this->configuration->getAutoWidth());

        $this->configuration->setAutoWidth(true);
        $this->assertSame('true',  $this->configuration->getAutoWidth());

        $this->configuration->setAutoWidth(false);
        $this->assertSame('false',  $this->configuration->getAutoWidth());
    }

    public function testSetDeferRender(): void
    {
        $this->assertSame('false',  $this->configuration->getDeferRender());

        $this->configuration->setDeferRender(true);
        $this->assertSame('true',  $this->configuration->getDeferRender());

        $this->configuration->setDeferRender(false);
        $this->assertSame('false',  $this->configuration->getDeferRender());
    }

    public function testSetInfo(): void
    {
        $this->assertSame('false',  $this->configuration->getInfo());

        $this->configuration->setInfo(true);
        $this->assertSame('true',  $this->configuration->getInfo());

        $this->configuration->setInfo(false);
        $this->assertSame('false',  $this->configuration->getInfo());
    }

    public function testSetOrdering(): void
    {
        $this->assertSame('true',  $this->configuration->getOrdering());

        $this->configuration->setOrdering(false);
        $this->assertSame('false',  $this->configuration->getOrdering());

        $this->configuration->setOrdering(true);
        $this->assertSame('true',  $this->configuration->getOrdering());
    }

}