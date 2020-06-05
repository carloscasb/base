<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => 'carlos',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('casb'),
        ]);
    }
}
