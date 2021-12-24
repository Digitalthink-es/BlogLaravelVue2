<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate(); // Limpia la tabla

        $category = new Category();
        $category->name = "Categoría 1";
        
        $category->save();

        $category = new Category();
        $category->name = "Categoría 2";
        
        $category->save();        
    }
}
