<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }

}
class UsersTableSeeder extends Seeder{

	public function run()
	{
		DB::table('users')->insert([
			['id'=>'1','name'=>'admin','username'=>'admin','password'=>Hash::make('admin'),'Address'=>'admin','Detail'=>'admin','email'=>'admin'],
		]);
	}
}

