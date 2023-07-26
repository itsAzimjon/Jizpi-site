<?php

namespace Database\Seeders;

use App\Models\Indicator;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indicator::create(['title' => 'Professorlar', 'number' => 35, 'image' => '/img/professor.png']);
        Indicator::create(['title' => 'O‘qituvchilar', 'number' => 450, 'image' => '/img/teacher1.png.png']);
        Indicator::create(['title' => 'Magistrlar', 'number' => 260, 'image' => '/img/grarduated.png.png']);
        Indicator::create(['title' => 'Qo‘shma ta’lim talabalari', 'number' => 260, 'image' => '/img/books.png']);
        Indicator::create(['title' => 'Dotsent', 'number' => 100, 'image' => '/img/teacher.png']);
        Indicator::create(['title' => 'Bakalavrlar', 'number' => 6390, 'image' => '/img/Group1.png']);
        Indicator::create(['title' => 'Sirqi talabalar', 'number' => 2880, 'image' => '/img/student.png']);
        Indicator::create(['title' => 'Xorijiy talabalar', 'number' => 10, 'image' => '/img/Group2.png']);
    }
}
