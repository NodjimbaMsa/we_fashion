<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'name'              => 'Edouard',
			'email'             => 'edouard.admin@we_fashion.fr',
			'email_verified_at' => now(),
			'password'          => Hash::make('admin'),
			'remember_token'    => Str::random(10),
		]);
    }
}
