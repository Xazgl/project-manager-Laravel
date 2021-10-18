<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $name=['Новая','В работе','Закончена'];
        foreach($name as $name1) {
            DB::table('statuses')->insert([
                'name'=>$name1

            ]);

        }
    }
}
