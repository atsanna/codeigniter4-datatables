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

    public function testSetPaging(): void
    {
        $this->assertSame('true',  $this->configuration->getPaging());

        $this->configuration->setPaging(false);
        $this->assertSame('false',  $this->configuration->getPaging());

        $this->configuration->setPaging(true);
        $this->assertSame('true',  $this->configuration->getPaging());
    }

    public function testSetPagingType(): void
    {
        $this->assertSame('full_numbers',  $this->configuration->getPagingType());

        $this->configuration->setPagingType('numbers');
        $this->assertSame('numbers',  $this->configuration->getPagingType());

        $this->configuration->setPagingType('simple');
        $this->assertSame('simple',  $this->configuration->getPagingType());

        $this->configuration->setPagingType('simple_numbers');
        $this->assertSame('simple_numbers',  $this->configuration->getPagingType());

        $this->configuration->setPagingType('full');
        $this->assertSame('full',  $this->configuration->getPagingType());

        $this->configuration->setPagingType('full_numbers');
        $this->assertSame('full_numbers',  $this->configuration->getPagingType());
        
        $this->configuration->setPagingType('first_last_numbers');
        $this->assertSame('first_last_numbers',  $this->configuration->getPagingType());
    }

    public function testSetProcessing(): void
    {
        $this->assertSame('true',  $this->configuration->getProcessing());

        $this->configuration->setProcessing(false);
        $this->assertSame('false',  $this->configuration->getProcessing());

        $this->configuration->setProcessing(true);
        $this->assertSame('true',  $this->configuration->getProcessing());
    }

}