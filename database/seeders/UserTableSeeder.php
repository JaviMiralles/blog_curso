<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = 'Francisco Javier';
        $user->email = 'ninhocnp@gmail.com ';
        $user->password = bcrypt('123123');
        $user->save();
    }
}
