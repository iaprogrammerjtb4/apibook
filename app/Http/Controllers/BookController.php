<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use App\Models\PublicationModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function createItem()
    {                 
        $item = '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>\n';           
        $item .= "<Libros>\n";        
        $item .= "Error Libro no encontrado";        
        $item .= "\n</Libros>\n";
        return $item;
    }

    
    function createItemOk($title,$isbn,$autores,$cover)
    {
        $item = '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>';           
        $item .= "<Libro>\n";
        $item .= "<titulo>". $title."</titulo>\n";
        $item .= "<Isbn>" . $isbn . "</Isbn>\n";
        $item .= "<Atores>";
        foreach($autores as $autor){
            $item .= " <Autor>";
            $item .= "<Nombre>".$autor['name']."</Nombre>\n";
            $item .= "<Url>".$autor['url']."</Url>\n";
            $item .= "</Autor>\n";        
        }
        $item .= "</Atores>";
        $item .= "<Caratula>".$cover."</Caratula>\n";        
        $item .= "</Libro>\n";
        return $item;
    }

    //GET list books
    public function index(Request $request)
    {
        $xml = $this->createItem();        
        if($request->has('isbn')){
            $books = BookModel::where('ISBN',$request->isbn)->get();            
            if(count($books)>0){            
                $objPublications = new PublicationModel();
                $arrAuthors = $objPublications->loadAuthorBook($books[0]->id);                
                $xml = $this->createItemOk($books[0]->title, $books[0]->ISBN,$arrAuthors,$books[0]->cover_large);             
                return response($xml,200)->header("Content-type","text/xml");
            }else        
                return response($xml,200)->header("Content-type","text/xml");

        }else{                        
            return BookModel::paginate(2);
        }        
    }

    //POST insert book
    public function store(Request $request)
    {
        $input = $request->all();
        if(!isset($input['ISBN'])){
            return response()->json(
                [
                    'res'=>false,
                    'message'=>'DEBE INGRESAR EL VALOR ISBN'
                ],status:200);
        }else{            
            BookModel::create($input);
            return response()->json(
                [
                    'res'=>true,
                    'message'=>'Registro éxitoso'
                ],status:200);        
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    //DELETE Book
    public function destroy($id)
    {
        BookModel::destroy($id);
        return response()->json(
            [
                'res'=>true,
                'message'=>'Registro eliminado correctamente'
            ],status:200);
    }
}
