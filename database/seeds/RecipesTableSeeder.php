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
            'user_id' => User::All()->where('name','nestor')->first()->id,
            'product_id' => Product::All()->where('id','3')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'pasos je',
            'user_id' => User::All()->where('name','maria')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 4,
            'description' => 'pasos jojo',
            'user_id' => User::All()->where('name','victor')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'pasos aaasda',
            'user_id' => User::All()->where('name','tere')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'description' => 'pasos lelelele',
            'user_id' => User::All()->where('name','jose')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        
    }
}
