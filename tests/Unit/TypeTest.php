<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Item;
use App\Type;

class TypeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_items() {
        $type = factory(Type::class)->create();
        $items = factory(Item::class, 5)->create(['type_id' => $type->id]);

        $this->assertEquals($type->items()->count(), $items->count());
    }
}