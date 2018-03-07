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
        DB::table('users')->insert([
            ['id'=>'1','name'=>'admin','username'=>'admin','password'=>Hash::make('admin'),'Address'=>'admin','Detail'=>'admin','email'=>'admin'],
        ]);

        /*lang*/
        DB::table('lang')->insert([
            ['Image'=>'vi.png','Locale'=>'vi','Name'=>'Việt Nam'],
            ['Image'=>'en.png','Locale'=>'en','Name'=>'England'],
        ]);
        /*colors*/
        DB::table('colors')->insert([
            ['id'=>'1','Code'=>'#ff0000'],
            ['id'=>'2','Code'=>'#0000ff'],
            ['id'=>'3','Code'=>'##00ff00'],
        ]);
        /*color_detail*/
        DB::table('color_detail')->insert([
            ['color_id'=>'1','lang_id'=>'1','Name'=>'Đỏ'],
            ['color_id'=>'2','lang_id'=>'1','Name'=>'Xanh Lam'],
            ['color_id'=>'3','lang_id'=>'1','Name'=>'Xanh Lá'],
            ['color_id'=>'1','lang_id'=>'2','Name'=>'Red'],
            ['color_id'=>'2','lang_id'=>'2','Name'=>'Blue'],
            ['color_id'=>'3','lang_id'=>'2','Name'=>'Green'],
            
            
        ]);
        /*category*/
        DB::table('categories')->insert([
            ['id'=>'1','Slug'=>'hoa'],
            ['id'=>'2','Slug'=>'trang-tri'],
            ['id'=>'3','Slug'=>'tin-tuc'],
            
           
            
            
        ]);
        /*category_detail*/
		DB::table('categories_detail')->insert([
            ['id'=>'1','categories_id'=>'1','lang_id'=>'1','Name'=>'Hoa'],
            ['id'=>'2','categories_id'=>'2','lang_id'=>'1','Name'=>'Trang Trí'],
            ['id'=>'3','categories_id'=>'3','lang_id'=>'1','Name'=>'Tin Tức'],
            ['id'=>'4','categories_id'=>'1','lang_id'=>'2','Name'=>'Flower'],
            ['id'=>'5','categories_id'=>'2','lang_id'=>'2','Name'=>'Decoration'],
            ['id'=>'6','categories_id'=>'3','lang_id'=>'2','Name'=>'News'],
            
            
           
			
            
		]);


	}
}

