<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $page = [
            'title' => '2020-08-01' ,
            'content' => '## TODO' ,
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('pages')->insert($page);

        $page2 = [
            'title' => '2020-08-02' ,
            'content' => '## TOSTOP' ,
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('pages')->insert($page2);
    }
}
