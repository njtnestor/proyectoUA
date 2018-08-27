<?php

use Illuminate\Database\Seeder;
use App\Recipe;
use Carbon\Carbon;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'description' => 'Este es un comentario de la pizza barbacoa del telepizza',
            'user_id' => '2',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id,
            'created_at' => Carbon::now()
        ]);
        DB::table('comments')->insert([
            'description' => 'Este es el segundo comentario de la pizza barbacoa del telepizza',
            'user_id' => '2',
            'recipe_id' => Recipe::All()->where('id',5)->first()->id,
            'created_at' => Carbon::now()
        ]);
    }
}
