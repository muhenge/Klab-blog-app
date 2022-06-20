<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\article;



class alerticle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         article::create([
            'title'=>'Forndation php oop',
            'conntent'=>'Forndation php oop is  hard to  learn',
            'user_id'=>'1'
         ]);
    }
}
