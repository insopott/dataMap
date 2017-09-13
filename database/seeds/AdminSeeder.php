<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'name'=>'admin',
                'email'=>'insopott@gmail.com',
                'password'=>bcrypt('insophiline'),
                'town_id'=>null,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),


            ]);
        DB::table('users')
            ->insert([
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>bcrypt('secret123'),
                'town_id'=>null,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),

            ]);
    }
}
