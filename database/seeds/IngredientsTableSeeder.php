<?php

use Illuminate\Database\Seeder;
use App\Recipe;
class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'name' => 'cebolla',
            'cantidad' => '2',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id
        ]);

        DB::table('ingredients')->insert([
            'name' => 'leche',
            'cantidad' => '2 litros',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id
        ]);

        DB::table('ingredients')->insert([
            'name' => 'harina',
            'cantidad' => '200g',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id
        ]);
    }
}
