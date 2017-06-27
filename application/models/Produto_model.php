<?php
/**
 * Description of Usuario_model
 *
 * @author Gabriel Carvalho
 */
class Produto_model extends CI_Model {
 
    public $idproduto;
    public $idcategoria;
    public $produto;
    public $preco;
    public $saldo;
    public $status;
 
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir($post){
        $this->idcategoria = $post['idcategoria'];
        $this->produto = $post['produto'];
        $this->preco = $post['preco'];
        $this->saldo = $post['saldo'];
        $this->status = 'S';
        return $this->db->insert('produto',$this);
    }

    public function delete($idproduto){
        $deleteProduto = $this->db->query("DELETE FROM produto WHERE idproduto = ".$idproduto."");
        if($deleteProduto){
            return true;
        }else{
            return false;
        }
    }

    public function verificaExistencia($idproduto){
        $query = $this->db->query("SELECT idproduto FROM produto WHERE idproduto = ".$idproduto."");
        if($query->num_rows() != 0){
            return true;
        }else{
            return false;
        }
    }

    public function atualizar($post){
        $query = $this->db->query("
            UPDATE 
                produto 
            SET 
                produto = '".$post['produto']."', 
                preco = ".number_format($post['preco'],2,'.','').", 
                status = '".$post['status']."', 
                idcategoria = '".$post['idcategoria']."', 
                saldo = '".$post['saldo']."' 
            WHERE 
                idproduto = ".$post['idproduto']."
        ");
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function listar(){
        $query = $this->db->query("
            SELECT 
                p.idproduto, 
                p.produto, 
                p.preco, 
                p.saldo, 
                c.categoria 
            FROM 
                produto p 
            INNER JOIN 
                categoria c ON c.idcategoria = p.idcategoria 
            WHERE 
                p.status = 'S'
        ");
        return $query->result_array();
    }

    public function listAllProducts(){
        $query = $this->db->query("
            SELECT 
                p.idproduto, 
                p.produto, 
                p.preco, 
                p.saldo, 
                p.status, 
                c.categoria 
            FROM 
                produto p 
            INNER JOIN 
                categoria c ON c.idcategoria = p.idcategoria 
        ");
        return $query->result_array();
    }

    public function getProdutoByID($idproduto){
        $query = $this->db->query("
            SELECT 
                p.idproduto, 
                p.produto, 
                p.preco, 
                p.saldo, 
                p.status,  
                c.idcategoria  
            FROM 
                produto p 
            INNER JOIN 
                categoria c ON c.idcategoria = p.idcategoria 
            WHERE 
                p.idproduto = ".$idproduto." 
        ");
        return $query->result_array();
    }
    


}