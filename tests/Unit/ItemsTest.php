<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /** @test */
    public function it_has_a_name()
    {
        $this->get();

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    /** @test */
    public function it_has_a_type()
    {

    }

    /** @test */
    public function it_has_a_value()
    {

    }

    public function it_has_an_image()
    {

    }
}
