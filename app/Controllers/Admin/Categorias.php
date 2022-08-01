<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Categorias extends BaseController
{

    private $categoriaModel; 

    public function __construct(){

        $this->categoriaModel = new \App\Models\CategoriaModel(); 

    }

    public function index(){
        $data = [
            'titulo' => 'Listando as categorias', 
            'categorias' => $this->categoriaModel->withDeleted(true)->paginate(10), 
            'pager' => $this->categoriaModel->pager
        ]; 

        //dd($data[ 'categorias']); 

       
        return view('Admin/Categorias/index', $data); 

    }

    public function procurar(){
        
        if(!$this->request->isAJAX()){

            exit('Pagina não encontrada');

        }

        // O term vem do index, seria o que nos digitamos na barra de pesquisa
        $categorias = $this->categoriaModel->procurar($this->request->getGet('term')); 
        $retorno = []; 

        foreach($categorias as $categoria){
            $data['id']= $categoria->id; 
            $data['value']= $categoria->nome;
            
            $retorno[] = $data; 
            
        }

        return $this->response->setJSON($retorno); 

        /* 
        echo '<pre>';
        print_r($this->request->getGet()); //Get -> mais detalhes
        exit;
        */ 
    }

    
}
