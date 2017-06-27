<?php
/**
 * Description of Venda_model
 *
 * @author Gabriel Carvalho
 */
class Venda_model extends CI_Model {
 
    // campos da tabela venda
    public $idvenda;
    public $idcliente;
    public $idusuario;
    public $data;
    public $status;

    //campos da tabela vendaitem, para gravar s itens da venda
    public $idproduto;
    public $preco;
    public $precopago;
    public $qtd;

 
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir($post){
        /*------------------------------------------------------------
            primeiro efetua o cadastro na tabela venda, para depois 
            recuperar os dados e poder gravar os iten dessa venda
        ------------------------------------------------------------*/
        $this->data = date('Y-m-d H:i:s');
        $this->idcliente = $post['idcliente'];
        $this->status = 'S';
        $this->idusuario = $post['idusuario'];
        $salesData = array(
            'data' => $this->data,
            'idcliente' => $this->idcliente,
            'status' => $this->status,
            'idusuario' => $this->idusuario
        );
        $cad_venda = $this->db->insert('venda',$salesData);
        /*------------------------------------------------------------
            agora recuperamos os dados da venda feita e vamos 
            cadsatrar os dados dessa venda na tabela vendaitem
        ------------------------------------------------------------*/
        if($cad_venda){
            $this->idvenda = $this->db->insert_id();
            foreach($post['idproduto'] as $key => $idproduto){
                $query = $this->db->query("
                    SELECT 
                        p.preco 
                    FROM 
                        produto p 
                    INNER JOIN 
                        categoria c ON c.idcategoria = p.idcategoria 
                    WHERE 
                        p.idproduto = $idproduto 
                    AND 
                        p.status = 'S'
                ");
                $price = $query->result_array();
                $valorTotal = $price[0]['preco'] * $post['qtd_'.$idproduto.''];
                $dados = array(
                    'idproduto' => $idproduto,
                    'idvenda' => $this->idvenda,
                    'preco' => $price[0]['preco'],
                    'precopago' => $valorTotal,
                    'qtd' => $post['qtd_'.$idproduto.'']
                );
                $cadVendaItem = $this->db->insert('vendaitem',$dados);
            }
            return true;
        }else{
            return false;
        }
    }

    public function delete($idvenda){
        $deleteItemVenda = $this->db->query("DELETE FROM vendaitem WHERE idvenda = $idvenda");
        $deleteVenda = $this->db->query("DELETE FROM venda WHERE idvenda = $idvenda");
        if($deleteItemVenda && $deleteVenda){
            return true;
        }else{
            return false;
        }
    }

    public function listar(){
        $query = $this->db->query("
            SELECT 
                v.idvenda, 
                v.data, 
                c.nome AS nome_cliente, 
                u.nome AS nome_usuario 
            FROM 
                venda v 
            INNER JOIN 
                cliente c ON c.idcliente = v.idcliente 
            INNER JOIN 
                usuario u ON u.idusuario = v.idusuario 
        ");
        return $query->result_array();
    }

    public function showSalesItens($idvenda){
        $query = $this->db->query("
            SELECT 
                vi.idproduto, 
                vi.idvenda, 
                vi.preco, 
                vi.precopago, 
                vi.qtd, 
                p.produto  
            FROM 
                vendaitem vi 
            INNER JOIN 
                produto p ON p.idproduto = vi.idproduto 
            INNER JOIN 
                venda v ON v.idvenda = vi.idvenda
            WHERE 
                vi.idvenda = $idvenda;
        ");
        return $query->result_array();
    }

    public function showSalesDetails($idvenda){
        $query = $this->db->query("
            SELECT 
                v.idvenda, 
                v.data, 
                c.nome AS nome_cliente, 
                u.nome AS nome_usuario 
            FROM 
                venda v 
            INNER JOIN 
                cliente c ON c.idcliente = v.idcliente 
            INNER JOIN 
                usuario u ON u.idusuario = v.idusuario 
            WHERE 
                v.idvenda = $idvenda 
        ");
        return $query->result_array();
    }

    public function showValorTotalVenda($idvenda){
        $query = $this->db->query("
            SELECT 
                SUM(vi.precopago) AS valorTotal 
            FROM 
                vendaitem vi 
            INNER JOIN 
                produto p ON p.idproduto = vi.idproduto 
            INNER JOIN 
                venda v ON v.idvenda = vi.idvenda
            WHERE 
                vi.idvenda = $idvenda
        ");
        return $query->result_array();
    }

    public function verificaExistencia($idvenda){
        $query = $this->db->query("SELECT idvenda FROM venda WHERE idvenda = ".$idvenda."");
        if($query->num_rows() != 0){
            return true;
        }else{
            return false;
        }
    }


}