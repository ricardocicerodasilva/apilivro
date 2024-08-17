<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Http\RedirectResponse;
use illuminate\Http\Response;
use illuminate\Support\Facades\Validator;

use App\Models\tbllivros;

class TbllivrosController extends Controller
{
    //construir o crud.
    
    //Mostrar todos os registros da tabela livros
    //Crud -> Read(leitura) Select/Visualizar

    public function index(){

        $regBook = tbllivros::All();
        $contador = $regBook->count();

        return 'Livros: '.$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }
    

    //Mostrar um tipo de registro especifico
    //Crud -> Read(leitura) Select/Visualizar
    //A função show busca e retorna se os livros foram localizados.
    public function show(string $id){ 
        $regBook = tbllivros::find($id);

        if($regBook){
            return 'Livros Localizados: '.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Livros não Localizados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }

    }

    //Cadastrar registros
    //Crud -> Create(criar/cadastrar)
    public function store(Request $request){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook[
            'nomeLivro'=>'required',
            'generoLivro'=>'required',
            'anoLivro'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros Invalidos: '.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        $regBookCad = tbllivros::create($regBook);

        if(){
            return 'Livros Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Livros não Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //Alterar registros
    //Crud -> update(alterar)
    public function update(){

    }

    //Deletar os registros
    //Crud -> delete(apagar)
    public function destroy(){

    }

    //Crud
    //C reate
    //r ead
    //u pdate
    //d elete

}
