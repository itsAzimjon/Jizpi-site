<?php

namespace Database\Seeders;

use App\Models\Firstnav;
use Illuminate\Database\Seeder;

class FirstnavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Firstnav::create(['name' => 'Institut', 'nav_id' => 1]);
        Firstnav::create(['name' => 'Kengashlar', 'nav_id' => 1]);
        Firstnav::create(['name' => 'Meyyoriy hujjatlar', 'nav_id' => 1]);
        Firstnav::create(['name' => 'Rektorat', 'nav_id' => 2]);
        Firstnav::create(['name' => 'Bo‘limlar', 'nav_id' => 2]);
        Firstnav::create(['name' => 'Markazlar', 'nav_id' => 2]);
        Firstnav::create(['name' => 'Fakultetlar', 'nav_id' => 2]);
        Firstnav::create(['name' => 'Kafedralar', 'nav_id' => 2]);
        Firstnav::create(['name' => 'Ilmiy faolyat', 'nav_id' => 3]);
        Firstnav::create(['name' => 'O‘quv faolyat', 'nav_id' => 3]);
        Firstnav::create(['name' => 'Xalqaro faolyat', 'nav_id' => 3]);
        Firstnav::create(['name' => 'Moliyaviy faolyat', 'nav_id' => 3]);
        Firstnav::create(['name' => 'Kol larkaz', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Bakalavr', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Magistratura', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Sirtqi ta’lim', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Doktrantura', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Xorijiy fuqarolar', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Qo‘shma ta’lim', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Ikkinchi Mutaxassislik', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Texnikumlar', 'nav_id' => 4]);
        Firstnav::create(['name' => 'Bakalavr', 'nav_id' => 5]);
        Firstnav::create(['name' => 'Magistratura', 'nav_id' => 5]);
        Firstnav::create(['name' => 'Sirtqi ta’lim', 'nav_id' => 5]);
        Firstnav::create(['name' => 'Xorijiy talabalar', 'nav_id' => 5]);
        Firstnav::create(['name' => 'O‘qishni ko‘chirish va qayta tiklash', 'nav_id' => 5]);
    }
}
