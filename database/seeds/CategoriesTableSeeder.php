<?php

use Hash as Hash;
use App\User;
use App\Model\Category;
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
        $category = new Category;
        $category->name = 'category one';
        $category->save();

        $category2 = new Category;
        $category2->name = 'category two';
        $category2->save();

        $category3 = new Category;
        $category3->name = 'category three';
        $category3->save();

    }
}
