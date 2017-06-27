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

    public function delete($idcategoria){
        $deleteCategoria = $this->db->query("DELETE FROM categoria WHERE idcategoria = ".$idcategoria."");
        if($deleteCategoria){
            return true;
        }else{
            return false;
        }
    }

    public function atualizar($post){
        $query = $this->db->query("
            UPDATE 
                categoria 
            SET 
                categoria = '".$post['categoria']."', 
                status = '".$post['status']."' 
            WHERE 
                idcategoria = ".$post['idcategoria']."
        ");
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function listar(){
        //monta o select html da view do cadastro de produtos
        $query = $this->db->query("SELECT idcategoria, categoria FROM categoria WHERE status = 'S'");
        return $query->result_array();
    }

    public function showAllCategories(){
        //exibi todas as categorias, na página de listagem das categorias
        $query = $this->db->query("SELECT idcategoria, categoria, status FROM categoria");
        return $query->result_array();
    }

    public function getCategoriaByID($idcategoria){
        $query = $this->db->query("
            SELECT 
                idcategoria, 
                categoria, 
                status 
            FROM 
                categoria 
            WHERE 
                idcategoria = ".$idcategoria."
        ");
        return $query->result_array();
    }

    public function verificaExistencia($idcategoria){
        $query = $this->db->query("SELECT idcategoria FROM categoria WHERE idcategoria = ".$idcategoria."");
        if($query->num_rows() != 0){
            return true;
        }else{
            return false;
        }
    }


}