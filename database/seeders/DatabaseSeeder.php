<?php

namespace Database\Seeders;

use App\Models\OrderHistory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            EBookSeeder::class,
            GenderSeeder::class,
            OrderHistorySeeder::class,
            OrderSeeder::class,
            RoleSeeder::class,
        ]);

        DB::table('users')->insert([
            'role_id'              => '1',
            'gender_id'            => '1',
            'first_name'           => 'Rock',
            'middle_name'          => 'Dwayne',
            'last_name'            => 'Johnson',
            'email'                => 'member@a.com',
            'password'             => Hash::make('password'),
            'display_picture_link' => 'images/person.jpg',
            'deleted_flag'         => '0',
            'modified_at'          => Date::now(),
        ]);
        DB::table('users')->insert([
            'role_id'              => '2',
            'gender_id'            => '1',
            'first_name'           => 'Bill',
            'middle_name'          => 'Microsoft',
            'last_name'            => 'Gates',
            'email'                => 'admin@a.com',
            'password'             => Hash::make('password'),
            'display_picture_link' => 'images/person2.jpg',
            'deleted_flag'         => '0',
            'modified_at'          => Date::now(),
        ]);

        User::factory()->count(10)->create();
    }

}
