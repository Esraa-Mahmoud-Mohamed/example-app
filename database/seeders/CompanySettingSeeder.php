<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySetting::firstOrCreate([
            'id' => 1,
        ], [
            'name' => 'Furni',
            'email' => 'info@example.com',
            'phone' => '+1 294 3925 3939',
            'address' => '123 Main Street, City, Country',
            'logo' => null,
            'favicon' => 'favicon.png',
            'facebook' => 'https://www.facebook.com/yourcompany',
            'twitter' => 'https://www.twitter.com/yourcompany',
            'instagram' => 'https://www.instagram.com/yourcompany',
            'linkedin' => 'https://www.linkedin.com/company/yourcompany',
            'footer_description' => 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in lacus a urna fermentum euismod. Integer mi nibh, dapibus ac scelerisque eu, facilisis quis purus. Morbi blandit sit amet turpis nec.',
            'copyright' => 'All Rights Reserved. — Designed with love by Untree.co Distributed By ThemeWagon',
        ]);
    }
}
