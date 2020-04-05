<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Item;

class ItemTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function it_has_a_name()
    {
        $item = factory(Item::class)->create();
        $this->assertNotNull($item->name);
    }

    /** @test */
    public function it_has_a_type()
    {
        $item = factory(Item::class)->create();
        $this->assertNotNull($item->type_id);
    }

    /** @test */
    public function it_has_a_value()
    {
        $item = factory(Item::class)->create();
        $this->assertNotNull($item->value);
    }

    /** @test */
    public function it_has_an_image()
    {
        $item = factory(Item::class)->create();
        $this->assertNotNull($item->image_path);
    }

    /** @test */
    public function it_has_a_location()
    {
        $item = factory(Item::class)->create();
        $this->assertNotNull($item->location_id);
    }

    /** @test */
    public function it_has_months()
    {
        $item = factory(Item::class)->create(['northern_months' => 'January,February']);

        $this->assertContains('February', $item->northernMonths());
    }
}
