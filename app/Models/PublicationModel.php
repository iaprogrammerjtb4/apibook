<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationModel extends Model
{
    use HasFactory;    

    protected $table = 'publications';

    public function loadAuthorBook($idBook){
        $data = PublicationModel::select('authors.name','authors.url')
                ->join('books', 'publications.book_id', '=', 'books.id')
                ->join('authors', 'publications.author_id', '=', 'authors.id')
                ->where('book_id',$idBook)
                ->get();

        return $data;
    }
}
