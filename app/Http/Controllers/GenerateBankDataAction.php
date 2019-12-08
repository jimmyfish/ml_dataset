<?php

namespace App\Http\Controllers;

use App\Bank;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenerateBankDataAction extends Controller
{
    public function generate($count, $format)
    {
        $faker = Factory::create();

        $collections = [];
        $nations = [
            'Germany', 'Italy', 'France', 'Netherlands', 'Austria', 'Turkey', 'Spain'
        ];

        $gender = [
            1 => 'Female',
            2 => 'Male'
        ];

        DB::table('bank')->truncate();

        system('clear');
        echo "Progress : 0%";

        for ($i = 0; $i < $count; $i++) {
            $pusher = [];


            $pusher['customer_id'] = (int) 15000000 + $i;
            $pusher['surname'] = $faker->firstName;
            $pusher['credit_score'] = rand(300, 999);
            $pusher['geography'] = $nations[array_rand($nations, 1)];
            $pusher['gender'] = $gender[array_rand($gender, 1)];
            $pusher['gender_numeric'] = array_search($pusher['gender'], $gender);
            $pusher['age'] = rand(30, 60);
            $pusher['tenure'] = rand(1, 10);
            $pusher['balance'] = rand(10, 1000000000);
            $pusher['num_of_product'] = rand(0, 5);
            $pusher['has_cr_card'] = $faker->boolean;
            $pusher['is_active_member'] = $faker->boolean;
            $pusher['estimated_salary'] = rand(10, 1000000);
            $pusher['exited'] = $faker->boolean;
            $pusher['created_at'] = new \DateTime();
            $pusher['updated_at'] = new \DateTime();

            try {
                DB::table('bank')->insert($pusher);
            } catch (\Exception $exception) {
                continue;
            }

            if ($i % 1000 === 0) {
                system('clear');
                echo "Progress {$i} of {$count}\n";
            }
        }

        echo DB::table('bank')->count() . " data has been generated!";
    }
}
