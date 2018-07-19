<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;
class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'serving' => 2,
            'description' => 'Estos son los pasos',
            'rating' => 3,
            'user_id' => User::All()->where('name','nestor')->first()->id,
            'product_id' => Product::All()->where('id','3')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'pasos je',
            'rating' => 3,
            'user_id' => User::All()->where('name','maria')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 4,
            'rating' => 2,
            'description' => 'pasos jojo',
            'user_id' => User::All()->where('name','victor')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'pasos aaasda',
            'rating' => 1,
            'user_id' => User::All()->where('name','tere')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'pasos lelelele',
            'rating' => 4,
            'user_id' => User::All()->where('name','jose')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'receta basrabacoa de nestor',
            'rating' => 2,
            'user_id' => User::All()->where('name','nestor')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'receta basrabacoa de pepe',
            'rating' => 3,
            'user_id' => User::All()->where('name','pepe')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'receta basrabacoa de pepe1',
            'rating' => 1,
            'user_id' => User::All()->where('name','pepe1')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'receta basrabacoa de pepe2',
            'rating' => 1,
            'user_id' => User::All()->where('name','pepe2')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'receta basrabacoa de pepe3',
            'rating' => 0,
            'user_id' => User::All()->where('name','pepe3')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        
    }
}
