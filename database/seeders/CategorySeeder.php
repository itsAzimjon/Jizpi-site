<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Barcha yangiliklar']);
        Category::create(['name' => 'O‘quv yangiliklar']);
        Category::create(['name' => 'Xalqaro yangiliklar']);
        Category::create(['name' => 'Yoshlarga oid']);
        Category::create(['name' => 'Ilmiy yangiliklar']);
        Category::create(['name' => 'Moddiy yangiliklar']);
    }
}
