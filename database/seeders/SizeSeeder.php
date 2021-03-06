<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create(['name' => 'XS']);
        Size::create(['name' => 'S']);
        Size::create(['name' => 'L']);
        Size::create(['name' => 'XL']);
    }
}
