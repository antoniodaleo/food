<?php

namespace App\Models;


use App\Libraries\Token; 
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    
    protected $table            = 'usuarios';
    protected $returnType       = 'App\Entities\Usuario'; /* Prima era um Objet */
    protected $allowedFields    = ['nome','email', 'cpf','telefone','password' , 'reset_hash', 'reset_expira_em' ];
    //Datas------------------------------------------------------------------------ 
    protected $useTimestamps = true;
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $dateFormat  = 'datetime'; //Para uso com o $useSoftDelete
    protected $useSoftDeletes   =  true;
    protected $deletedField  = 'deletado_em';
    //Validações------------------------------------------------------------------------
    protected $validationRules = [
        'nome'     => 'required|min_length[4]|max_length[120]',
        'email'        => 'required|valid_email|is_unique[usuarios.email]',
        'cpf'        => 'required|exact_length[14]|validaCPF|is_unique[usuarios.cpf]',
        'telefone' => 'required', 
        'password'     => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]',
    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo nome é obrigatorio',
            'is_unique' => 'Desculpa. Esse email já existe',
        ],
        'email' => [
            'required' => 'O campo email é obrigatorio',
            'is_unique' => 'Desculpa. Esse email já existe',
        ],

        'cpf' => [
            'required' => 'O campo cpf é obrigatorio',
            'is_unique' => 'Desculpa. Esse cpf já existe',
        ], 

    ];


    //Evento callback
    protected $beforeInsert = ['hashPassword']; 
    protected $beforeUpdate = ['hashPassword']; 
    
    protected function hashPassword(array $data){

        if(isset($data['data']['password'])) {

            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT); 

            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);         
        }


        return $data; 
    }


    /* 

        @uso Controller usuarios no metodo procurar com o autocomplete
        @param string $term
        @return array usuarios
    
    */


    public function procurar($term){
        if($term === null){


            return [];
        }


        return $this->select('id, nome')
                ->like('nome', $term)
                ->withDeleted(true)
                ->get() 
                ->getResult(); 


    }


    public function desabilitaValidacaoSenha(){

        unset($this->validationRules['password']); 
        unset($this->validationRules['password_confirmation']); 
    }
   
    public function desfazerExclusao(int $id){
        return $this->protect(false)
                    ->where('id', $id)
                    ->set('deletado_em', null)
                    ->update(); 
    }


    /*
        @param string $email 
        @objeto email    
    
    */

    public function buscaUsuarioPorEmail(string $email){
        return $this->where('email', $email)->first(); 


    }

    public function buscaUsuarioParaResetarSenha(string $token){

        $token = new Token($token); 

        $tokenHash = $token->getHash(); 
        $usuario = $this->where('reset_hash', $tokenHash)->first();

        if($usuario != null){

            if($usuario->reset_expira_em < date('Y-m-d H:i:s')){

                /* Token expirado */
                $usuario = null; 

            }

            return $usuario; 

        }

    }


    /* 
    protected $useTimestamps    = true;
    protected $createdField     = 'criado_em'; // Nome da coluna no banco de dados
    protected $updatedField     = 'atualizado_em'; // Nome da coluna no banco de dados
    protected $deletedField     = 'deletado_em'; // Nome da coluna no banco de dados
    */

    
}
