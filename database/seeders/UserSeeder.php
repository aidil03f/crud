<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Admin',
                'username' => 'Admin01',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123')
            ],
            [
                'name' => 'Author',
                'username' => 'Author01',
                'role' => 'author',
                'email' => 'author@gmail.com',
                'password' => bcrypt('author123')
            ]
        ])->each(function($data){
            User::create($data);
        });
    }
}
