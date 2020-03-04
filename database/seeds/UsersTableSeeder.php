<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Arr;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rinaldi',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role' => 0
        ]);
        $faker = Faker\Factory::create();
        $arr = [0,1,2,3];
        for ($i=0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'role' => Arr::random($arr),
            ]);

        }


    }
}
