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

    public function getUsuarioByID($idusuario){
        $query = $this->db->query("
            SELECT 
                idusuario, 
                nome, 
                email, 
                status 
            FROM 
                usuario 
            WHERE 
                idusuario = $idusuario
        ");
        return $query->result_array();
    }

    public function atualizar($post){
        if($post['senha'] == ''){
            $senha = '';
        }else{
            $senha = "senha = ".md5($post['senha']).", ";
        }
        $query = $this->db->query("
            UPDATE 
                usuario 
            SET 
                nome = '".$post['nome']."',
                email = '".$post['email']."',
                ".$senha."
                status = '".$post['status']."' 
            WHERE 
                idusuario = ".$post['idusuario']."
        ");
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function delete($idusuario){
        $deleteUsuario = $this->db->query("DELETE FROM usuario WHERE idusuario = ".$idusuario." ");
        if($deleteUsuario){
            return true;
        }else{
            return false;
        }
    }

    public function verificaExistencia($idusuario){
        $query = $this->db->query("SELECT idusuario FROM usuario WHERE idusuario = ".$idusuario."");
        if($query->num_rows() != 0){
            return true;
        }else{
            return false;
        }
    }


}