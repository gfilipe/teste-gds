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
        $query = $this->db->query("SELECT idcliente, nome FROM cliente WHERE ativo = 'S' ");
        return $query->result_array();
    }

    


}