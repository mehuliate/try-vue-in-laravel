<?php

use Illuminate\Database\Seeder;
use App\Outlet;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class OutletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        echo 'start';
        $start = microtime(TRUE);
        for ($i=0; $i < 1000; $i++) { 
            $arr = [1,0];
            Outlet::firstOrCreate([
                'code' => $faker->unique()->regexify('[A-Za-z0-9]{5}'). $i,
                'name' => $faker->name,
                'status' => Arr::random($arr),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber
            ]);
        }
        $end = microtime(TRUE);
        echo "take " . ($end - $start) . " seconds.";
    }
}
