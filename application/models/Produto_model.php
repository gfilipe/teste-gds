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

    public function deletar($post){
        
    }

    public function alterar($post){
        
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

    


}