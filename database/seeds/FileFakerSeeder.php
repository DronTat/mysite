<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class FileFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = null;
        $faker = Faker::create('App\File');
        for ($i = 1; $i <= 500; $i++) {
            $email = null;
            $arr = [0];
            for ($y = 1; $y <= 10000; $y++){
                $arr[] = [
                    'email' => $email = $faker->email,
                    'email_hash' => hash('md5', $email),
                    'file_hash' => $faker->md5,
                    'commit' => $faker->sentence
                ];
            };
            unset($arr[0]);
            DB::table('files')->insert($arr);
            $count = $i;
            $this->command->info('Заполнен на '.$count. '0 000');
        }
        $this->command->info('Таблица файлов заполнена на '.$count. '0 000');
    }
}
