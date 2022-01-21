<?php

namespace Database\Seeders;

use App\Models\NavLogo;
use Illuminate\Database\Seeder;

class NavLogoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       NavLogo::create([
        'logo_link'=>'https://www.linkedin.com/signup',
        'logo_image'=>'1.jpg',
        'logo_name'=>'logo'
       ]);
    }
}
