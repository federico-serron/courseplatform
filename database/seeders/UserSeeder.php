<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
           'name' => 'Federico Serron',
           'email' => 'fserron@federicoserron.site',
           'password' => bcrypt('fede1992') 
        ]);

        $user->assignROle('Administrador');

        User::factory(99)->create();
    }
}
