<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Factory as F;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        $faker = F::create('lt_LT');
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role' => 10,
        ]);

        foreach (['Woman', 'Man', 'Bed', 'Child'] as $category) {
            DB::table('categories')->insert([
                'category' => $category,
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }
        foreach (['Skirt', 'Shoes', 'T-shirts', 'Pants'] as $subCategory) {
            DB::table('sub_categories')->insert([
                'sub_category' => $subCategory,
                'category_id' => rand(1, 4),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }

        $title = ['MB', 'Volvo', 'Scania', 'Kamaz', 'Avia', 'DAF', 'Iveco', 'MAN', 'Ford', 'Mack', 'Tesla'];


        foreach(range(1,50) as $_){
            DB::table('items')->insert([
                'title' => $title[rand(0, count($title)-1)],
                'price' => rand(100, 1000) / 100,
                'category_id' => rand(1, 4),
                'sub_category_id' => rand(1, 4),
                'about' => $faker->paragraph(rand(1,10)),
            ]);
        }
        
    }
}
