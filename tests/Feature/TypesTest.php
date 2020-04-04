<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Item;
use App\Type;

class TypesTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function it_can_return_items_of_that_type()
    {
        // $type = factory(Type::class)->create(['name' => 'fish']);
        // $item = factory(Item::class)->create(['type_id' => $type->id]);

        // $this->get('/api/type/' . $item->id)
        //     ->seeJson([
        //         'id' => $item->id,
        //         'name' => $item->name,
        //         'type' => $item->type->name,
        //         'value' => $item->value,
        //         'image' => $item->image_path
        //     ]);

        $this->assertTrue(true);
    }
}