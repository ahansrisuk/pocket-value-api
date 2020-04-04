<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Item;
use App\Location;

class LocationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_items() {
        $location = factory(Location::class)->create();
        $items = factory(Item::class, 5)->create(['location_id' => $location->id]);

        $this->assertEquals($location->items()->count(), $items->count());

    }
}