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
        /*users*/
        // DB::table('users')->insert([
        //     ['id'=>'1','name'=>'admin','username'=>'admin','password'=>Hash::make('admin'),'Address'=>'admin','Detail'=>'admin','email'=>'admin'],
        // ]);

        /*lang*/
        // DB::table('lang')->insert([
        //     ['Image'=>'vi.png','Locale'=>'vi','Name'=>'Việt Nam'],
        //     ['Image'=>'en.png','Locale'=>'en','Name'=>'England'],
        // ]);
        /*colors*/
        DB::table('colors')->insert([
            ['Code'=>'#ff0000'],
            ['Code'=>'#0000ff'],
            ['Code'=>'##00ff00'],
        ]);
        /*color_detail*/
		DB::table('colors')->insert([
            ['color_id'=>'1','lang_id'=>'1','Name'=>'Đỏ'],
            ['color_id'=>'2','lang_id'=>'1','Name'=>'Xanh Lam'],
            ['color_id'=>'3','lang_id'=>'1','Name'=>'Xanh Lá'],
            ['color_id'=>'1','lang_id'=>'2','Name'=>'Red'],
            ['color_id'=>'2','lang_id'=>'2','Name'=>'Blue'],
            ['color_id'=>'3','lang_id'=>'2','Name'=>'Green'],
			
            
		]);


	}
}

