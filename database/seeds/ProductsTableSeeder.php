<?php

use Illuminate\Database\Seeder;
use App\User;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Pizza carbonara',
            'marca' => 'Telepizza',
            'approved' => true,
            'user_id' => User::All()->where('name','nestor')->first()->id
        ]);
        DB::table('products')->insert([
            'name' => 'Pizza barbacoa',
            'marca' => 'Telepizza',
            'approved' => true,
            'user_id' => User::All()->where('name','nestor')->first()->id
        ]);
        DB::table('products')->insert([
            'name' => 'Pizza carbonara',
            'marca' => 'Dominos pizza',
            'approved' => true,
            'user_id' => User::All()->where('name','nestor')->first()->id
        ]);
        DB::table('products')->insert([
            'name' => 'Caldo pollo',
            'marca' => 'Aneto',
            'approved' => true,
            'user_id' => User::All()->where('name','nestor')->first()->id
        ]);
        DB::table('products')->insert([
            'name' => 'Caldo Jamon',
            'marca' => 'Aneto',
            'approved' => true,
            'user_id' => User::All()->where('name','nestor')->first()->id
        ]);
        DB::table('products')->insert([
            'name' => 'Caldo pollo',
            'marca' => 'Gallina blanca',
            'approved' => true,
            'user_id' => User::All()->where('name','nestor')->first()->id
        ]);
    }
}
