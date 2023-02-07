<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<100; $i++) {
            \Illuminate\Support\Facades\DB::table('tasks')->insert([
           'name' => str::random(10),
           'created_at'  => date('Y-m-d H:i:s'),
           'updated_at'  => date('Y-m-d H:i:s'),
           'user_id' => rand(1, 2)
           ]);
         }
    }
}
