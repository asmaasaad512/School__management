<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Grade::create([
        'name' => json_encode([
            'en' => 'Grade 1',
            'ar' => 'المرحلة الابتدائية',  
           ]),
           'notes' => json_encode([
              'en' => 'this ff good ',
              'ar' =>'شكرا جدا لكم ',  
             ]) 
    ]);
    Grade::create([
        'name' => json_encode([
            'en' => 'Grade 2',
            'ar' => 'المرحلة الاعدادية',  
           ]),
           'notes' => json_encode([
              'en' => 'this ff good ',
              'ar' =>'شكرا جدا لكم ',  
             ]) 
    ]);
    }
}
