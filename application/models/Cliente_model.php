<?php
/**
 * Description of Usuario_model
 *
 * @author Gabriel Carvalho
 */
class Cliente_model extends CI_Model {
 
    public $idcliente;
    public $nome;
    public $email;
    public $ativo;
 
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir($post){
        $this->nome  = $post['nome'];
        $this->email = $post['email'];
        $this->ativo = 'S';
        return $this->db->insert('cliente',$this);
    }

    public function listar(){
        $query = $this->db->query("SELECT idcliente, nome FROM cliente WHERE ativo = 'S'");
        return $query->result_array();
    }

    public function showAllCustomers(){
        $query = $this->db->query("
            SELECT 
                idcliente, 
                nome, 
                email, 
                ativo 
            FROM 
                cliente 
        ");
        return $query->result_array();
    }

    public function delete($idcliente){
        $deleteCliente = $this->db->query("DELETE FROM cliente WHERE idcliente = $idcliente");
        if($deleteCliente){
            return true;
        }else{
            return false;
        }
    }

    public function getClienteByID($idcliente){
        $query = $this->db->query("
            SELECT 
                idcliente, 
                nome, 
                email, 
                ativo 
            FROM 
                cliente 
            WHERE 
                idcliente = $idcliente
        ");
        return $query->result_array();
    }

    public function atualizar($post){
        $query = $this->db->query("
            UPDATE 
                cliente 
            SET 
                nome = '".$post['nome']."',
                email = '".$post['email']."',
                ativo = '".$post['ativo']."' 
            WHERE 
                idcliente = ".$post['idcliente']."
        ");
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function verificaExistencia($idcliente){
        $query = $this->db->query("SELECT idcliente FROM cliente WHERE idcliente = ".$idcliente."");
        if($query->num_rows() != 0){
            return true;
        }else{
            return false;
        }
    }


}