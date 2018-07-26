<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;
use Carbon\Carbon;
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
            'image' => 'https://factorgastronomic.com/wp-content/uploads/2015/01/pizza-carbonara.jpg',
            'description' => 'Estos son los pasos',
            'rating' => 3,
            'user_id' => User::All()->where('name','nestor')->first()->id,
            'product_id' => Product::All()->where('id','3')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'image' => 'https://i.ytimg.com/vi/00jWCP0EE6w/maxresdefault.jpg',
            'description' => 'pasos je',
            'rating' => 3,
            'user_id' => User::All()->where('name','maria')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 4,
            'image' => 'https://www.onemagazine.es/fotos/1/pizza_barbacoa_gourmet.jpg',
            'rating' => 2,
            'description' => 'pasos jojo',
            'user_id' => User::All()->where('name','victor')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'image' => 'http://www.ollasgm.com/wp-content/uploads/2015/03/pizza-carbonara-olla-gm-495x400.jpg',
            'description' => 'pasos aaasda',
            'rating' => 1,
            'user_id' => User::All()->where('name','tere')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'image' => 'https://www.todosacomer.net/wp-content/uploads/2010/03/pizza_ternera.jpg',
            'description' => 'pasos lelelele',
            'rating' => 4,
            'user_id' => User::All()->where('name','jose')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id,
            'created_at' => Carbon::now()
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'image' => 'http://placeralplato.com/files/2013/07/Pizza-barbacoa-terminada.jpg',
            'description' => 'receta basrabacoa de nestor',
            'rating' => 2,
            'user_id' => User::All()->where('name','nestor')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'image' => 'https://i0.wp.com/vegamecum.com/wp-content/uploads/2017/03/Pizza_barbacoa_1.jpg?resize=840%2C538&ssl=1',
            'description' => 'receta basrabacoa de pepe',
            'rating' => 3,
            'user_id' => User::All()->where('name','pepe')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'image' => 'http://www.kebabmian.com/43-thickbox_default/pizza-barbacoa.jpg',
            'description' => 'receta basrabacoa de pepe1',
            'rating' => 1,
            'user_id' => User::All()->where('name','pepe1')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'image' => 'http://estag.fimagenes.com/busquedas/pizza-barbacoa_2_900.jpg',
            'description' => 'receta basrabacoa de pepe2',
            'rating' => 1,
            'user_id' => User::All()->where('name','pepe2')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        DB::table('recipes')->insert([
            'serving' => 3,
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4DpX1A4B6z9HwSBy2Wr4odmIDxJAPZodxQ0y5MJOFizllngpF',
            'description' => 'receta basrabacoa de pepe3',
            'rating' => 0,
            'user_id' => User::All()->where('name','pepe3')->first()->id,
            'product_id' => Product::All()->where('id','2')->first()->id
        ]);
        
    }
}
