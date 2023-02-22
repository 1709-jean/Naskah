<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Hello';
        $user->email = 'admin@gmail.com';
        $user->password = hash::make('123');
        $user->level = 'Admin';
        $user->save();
    }
}
