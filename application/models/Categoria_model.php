<?php
/**
 * Description of Categoria_model
 *
 * @author Gabriel Carvalho
 */
class Categoria_model extends CI_Model {
 
    public $idcategoria;
    public $categoria;
    public $status;
 
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir($post){
        $this->categoria = $post['categoria'];
        $this->status = 'S';
        return $this->db->insert('categoria',$this);
    }

    public function deletar($post){
        
    }

    public function alterar($post){
        
    }

    public function listar(){
        $query = $this->db->query("SELECT idcategoria, categoria FROM categoria WHERE status = 'S'");
        return $query->result_array();
    }

    


}