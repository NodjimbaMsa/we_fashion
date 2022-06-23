<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Size;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Psy\Readline\Hoa\ConsoleOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo 'Records processed'. PHP_EOL;

        // $fileNames = array_map(function($file){
        //     return basename($file);
        // }, $files);
        $this->call(CategorySeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ProductSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
