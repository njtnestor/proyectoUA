<?php

use Illuminate\Database\Seeder;
use App\Recipe;
class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->insert([
            'step' => 0,
            'description' => 'me gusta este paso 1',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id,
        ]);
        DB::table('steps')->insert([
            'step' => 1,
            'description' => 'me gusta este paso 2',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id,
        ]);
        DB::table('steps')->insert([
            'step' => 2,
            'description' => 'me gusta este paso 3',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id,
        ]);
        DB::table('steps')->insert([
            'step' => 3,
            'description' => 'me gusta este paso 4',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id,
        ]);
    }
}
