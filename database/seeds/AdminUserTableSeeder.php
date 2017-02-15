<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new Admin;
      $user->name = "Jane Doe";
      $user->email = "janedoe@email.com";
      $user->password = crypt('secret', "");
      $user->save();
    }
}
