<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('books')->insert([
            [
                'id'=>1,
                'ISBN'=>'0619101857',
                'title'=>'Practical Office XP',                
                'cover_large'=>'https://covers.openlibrary.org/b/id/4986592-L.jpg'
            ],
            [
                'id'=>2,
                'ISBN'=>'0760034400',
                'title'=>'New Perspectives on Computer Concepts',                
                'cover_large'=>''
            ],
            [
                'id'=>3,
                'ISBN'=>'0760054487',
                'title'=>'New perspectives on Microsoft Windows 98',                
                'cover_large'=>'https://covers.openlibrary.org/b/id/6544097-L.jpg'
            ],
            [
                'id'=>4,
                'ISBN'=>'0120121123',
                'title'=>'Advances in Computers, Vol. 12',                
                'cover_large'=>'https://covers.openlibrary.org/b/id/9297074-L.jpg'
            ]
        ]);        

        DB::table('authors')->insert([
            [
                'id'=>1,
                'name'=>'une Jamrich Parsons',
                'url'=>'https://openlibrary.org/authors/OL323185A/June_Jamrich_Parsons',                
            ],
            [
                'id'=>2,
                'name'=>'Dan Oja',
                'url'=>'https://openlibrary.org/authors/OL2734323A/Dan_Oja',                
            ],
            [
                'id'=>3,
                'name'=>'Joan Carey',
                'url'=>'https://openlibrary.org/authors/OL2734344A/Joan_Carey',        
            ],
            [
                'id'=>4,
                'name'=>'Marshall C. Yovits',
                'url'=>'https://openlibrary.org/authors/OL3244931A/Marshall_C._Yovits',                
            ],
        ]);


        DB::table('publications')->insert([
            [
                'book_id'=>1,
                'author_id'=>1,
            ],
            [
                'book_id'=>1,
                'author_id'=>2,
            ],
            [
                'book_id'=>2,
                'author_id'=>1,
            ],
            [
                'book_id'=>2,
                'author_id'=>2,
            ],
            
            [
                'book_id'=>3,
                'author_id'=>1,
            ],
            [
                'book_id'=>3,
                'author_id'=>2,
            ],
            [
                'book_id'=>3,
                'author_id'=>3,
            ],            
            [
                'book_id'=>4,
                'author_id'=>4,
            ],
        ]);
    }
}
