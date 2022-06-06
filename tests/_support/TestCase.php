<?php

namespace Tests\Support;

use Datatables\Datatables;
use CodeIgniter\CodeIgniter;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\Mock\MockCodeIgniter;
use Config\App;
use Config\Autoload;
use Config\Modules;
use Config\Services;
use Faker\Factory;
use CodeIgniter\Shield\Test\AuthenticationTesting;

/**
 * @internal
 */
abstract class TestCase extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;
    use AuthenticationTesting;

    /**
     * When migrations are ran, will ensure
     * all migrations in all modules will run.
     */
    protected $namespace = '';

    /**
     * @var Factory
     */
    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();   // @phpstan-ignore-line
        helper('datatables');
    }

    /**
     * Loads up an instance of CodeIgniter
     * and gets the environment setup.
     *
     * @return CodeIgniter
     */
    protected function createApplication()
    {
        $app = new MockCodeIgniter(new App());
        $app->initialize();

        // Initialize Datatables so that the DT namespaces get added in
        $datatables = new Datatables();
        $datatables->boot();

        return $app;
    }


}
