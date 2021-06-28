<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Stuart Harrison',
            'email' => 'stuart@itecassist.co.za',
            'password' => Hash::make('password'),
            'role'=>9
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Doctor::factory(20)->create();
    }
}
