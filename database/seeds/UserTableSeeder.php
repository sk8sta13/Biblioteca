<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\User::class)->create([
			'name' => 'Marcelo Soto Campos',
			'email' => 'sk8sta13@gmail.com',
			'password' => bcrypt('marcelosk8'),
			'profile' => 'Administrador',
			'active' => 1
		]);
		factory(App\User::class, 9)->create();
    }
}
