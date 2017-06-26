<?php
/**
 * Description of Usuario_model
 *
 * @author Gabriel Carvalho
 */
class Usuario_model extends CI_Model {
 
    public $idusuario;
    public $nome;
    public $email;
    public $senha;
    public $status;
 
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir($post){
        $this->nome   = $post['nome'];
        $this->email = $post['email'];
        $this->senha = md5($post['senha']);
        $this->status = 'S';
        return $this->db->insert('usuario',$this);
    }

    public function listar(){
        $query = $this->db->query("SELECT idusuario, nome FROM usuario WHERE status = 'S'");
        return $query->result_array();
    }

    public function listarTodos(){
        $query = $this->db->query("
            SELECT 
                idusuario, 
                nome, 
                email, 
                status  
            FROM 
                usuario 
        ");
        return $query->result_array();
    }


}