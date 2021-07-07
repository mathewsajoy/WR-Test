<?php

use Illuminate\Database\Seeder;
use tiatech\core\src\models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $db_array = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'admin' => '1',
            'password' =>bcrypt('123456'),
        ];

        User::create($db_array);

        $this->command->info('Admin user seeded');
    }
}


