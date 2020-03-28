<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Item;

class ItemsTest extends TestCase
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

    public function it_has_an_image()
    {
        $item = factory(Item::class)->create();
        $this->assertNotNull($item->image_path);
    }
}
