<?php

namespace Database\Seeders;

use App\Models\Appoint;
use Illuminate\Database\Seeder;

class AppointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appoint::create(['title' => 'Tayinlov', 'text' => 'Once the api_token column has been added to your users table, you are ready to assign random API tokens to each user that registers with your application. You should assign these tokens when a User model is created for the user during registration.', 'image' =>'/img/tem.png']);
    }
}
