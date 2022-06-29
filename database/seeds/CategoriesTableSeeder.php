<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorieslist = ['primi piatti', 'secondi piatti','Contorni','Dolci'];
        forEach($categorieslist as $category){
            $newCategory = new Category();
            $newCategory->name= $category;
            $newCategory->slug = Str::of($newCategory->name)->slug('-');

            $newCategory->save();
        }
    }
}
