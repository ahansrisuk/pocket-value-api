<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Item;
use App\Time;

class TimeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_items() {
        $type = factory(Time::class)->create();
        $items = factory(Item::class, 5)->create(['time_id' => $time->id]);

        $this->assertEquals($type->items()->count(), $items->count());
    }
}