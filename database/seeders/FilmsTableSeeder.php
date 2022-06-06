<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('films')->delete();
        
        \DB::table('films')->insert(array (
            0 => 
            array (
                'id' => 19,
                'name' => 'Harry Poter',
                'slug' => 'harry-poter',
                'description' => 'Harry Poter',
                'release_date' => '2022-06-06',
                'ticket_price' => 1000,
                'rating' => '4',
                'country' => 'USA',
                'genre' => 'Action',
                'photo' => 'C:\\xampp\\tmp\\php2A30.tmp',
                'created_at' => '2022-06-05 19:19:03',
                'updated_at' => '2022-06-05 20:49:32',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 20,
                'name' => 'Jurasic World',
                'slug' => 'jurasic-world',
                'description' => 'Jurasic World',
                'release_date' => '2022-06-07',
                'ticket_price' => 1000,
                'rating' => '3',
                'country' => 'USA',
                'genre' => 'Horror',
                'photo' => 'C:\\xampp\\tmp\\php5033.tmp',
                'created_at' => '2022-06-05 20:39:36',
                'updated_at' => '2022-06-05 20:49:40',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 21,
                'name' => 'Sharks',
                'slug' => 'sharks',
                'description' => 'Sharks',
                'release_date' => '2022-06-08',
                'ticket_price' => 1000,
                'rating' => '2',
                'country' => 'USA',
                'genre' => 'Magic',
                'photo' => 'C:\\xampp\\tmp\\phpAA30.tmp',
                'created_at' => '2022-06-05 20:45:00',
                'updated_at' => '2022-06-05 20:49:46',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}