<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class); 
        $this->call(UserSeeder::class); 
        $this->call(GradeSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(GenderSeeder::class); 
        $this->call(NationalitySeeder::class); 
        $this->call(ReligonSeeder::class); 
        $this->call(Blood_typeSeeder::class); 
       
        $this->call(MyParentSeeder::class); 
    }
}   
