<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('ISBN',10);            
            $table->longText('title');                        
            $table->longText('cover_large');                    
        });

        Schema::create('authors', function (Blueprint $table) {    
            $table->id();
            $table->string('name',128);            
            $table->longText('url');                              
        });

        Schema::create('publications',function (Blueprint $table) {            
            $table->unsignedBigInteger('book_id'); 
            $table->foreign('book_id')->references('id')->on('books');              
            $table->unsignedBigInteger('author_id'); 
            $table->foreign('author_id')->references('id')->on('authors');  
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
        Schema::dropIfExists('books');        
    }
}
