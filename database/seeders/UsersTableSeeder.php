<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$23XxKPNVRkgcTBaQrwzgd.A8TPi6LLjvsAsiZo..kv8tjY5/mBdLa',
                'remember_token' => NULL,
                'created_at' => '2022-06-01 16:43:31',
                'updated_at' => '2022-06-01 16:43:31',
            ),
        ));
        
        
    }
}