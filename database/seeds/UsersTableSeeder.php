<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); // Limpia la tabla

		$user = new User();
		$user->name = "Daniel Martínez Piñero";
		$user->email = "dmpinero@gmail.com";
		$user->password = bcrypt("123456");
        
        $user->save();        
    }
}
