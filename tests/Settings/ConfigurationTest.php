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

}