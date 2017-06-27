<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function index()
	{
		//pagina para listar todos os produtos cadastrados
		$this->load->model('Produto_model','prod',TRUE);
		$data['produtos'] = $this->prod->listAllProducts();
		$this->load->view('listar_produtos',$data);
	}

	public function add()
	{
		//página para cadastrar os produtos
		$this->load->model('Categoria_model','cat',TRUE);
		$data['categorias'] = $this->cat->listar();
		$this->load->view('add_produto',$data);
	}

	public function cadastrar()
	{
		//cadastra o produto no banco de dados
		$this->load->model('Produto_model','prod',TRUE);
		$add = $this->prod->inserir($this->input->post());
		if($add){
			echo '<script>alert("Produto cadastrado com sucesso");</script>';
			$this->add();
		}else{
			echo '<script>alert("Produto não cadastrado");</script>';
			$this->add();
		}
	}

	public function delete($idproduto){
		//deleta o produto no banco de dados
		$this->load->model('Produto_model','prod',TRUE);
		$existe = $this->prod->verificaExistencia($idproduto);
		if($existe){
			$del = $this->prod->delete($idproduto);
			if($del){
				echo '<script>alert("produto excluído com sucesso!");</script>';
				redirect('produto/','refresh');
			}else{
				echo '<script>alert("não foi possível excluir esse produto!");</script>';
				redirect('produto/','refresh');
			}
		}else{
			echo '<script>alert("produto não encontrado ou inexistente!");</script>';
			redirect('produto/','refresh');
		}		
	}

	public function edit($idproduto){
		//direciona para a página de edição de um determinado produto
		$this->load->model('Produto_model','prod',TRUE);
		$existe = $this->prod->verificaExistencia($idproduto);
		if($existe){
			$this->load->model('Categoria_model','cat',TRUE);
			$data['produto'] = $this->prod->getProdutoByID($idproduto);
			$data['categorias'] = $this->cat->listar();
			$this->load->view('edit_produto',$data);
		}else{
			echo '<script>alert("produto não encontrado ou inexistente!");</script>';
			redirect('produto/','refresh');
		}
	}

	public function atualizar($idproduto){
		//atualiza o produto no banco de dados
		$this->load->model('Produto_model','prod',TRUE);
		$existe = $this->prod->verificaExistencia($idproduto);
		if($existe){
			$dados = array(
				'idproduto' => $idproduto,
				'produto' => $this->input->post('produto'),
				'preco' => $this->input->post('preco'),
				'status' => $this->input->post('status'),
				'idcategoria' => $this->input->post('idcategoria'),
				'saldo' => $this->input->post('saldo')
			);
			$add = $this->prod->atualizar($dados);
			if($add){
				echo '<script>alert("produto atualizado com sucesso!");</script>';
				redirect('produto/','refresh');
			}else{
				echo '<script>alert("não foi possível atualizar esse produto!");</script>';
				redirect('produto/','refresh');
			}
		}else{
			echo '<script>alert("produto não encontrado ou inexistente!");</script>';
			redirect('produto/','refresh');
		}
	}


}

/* End of file Produto.php */
/* Location: ./application/controllers/Produto.php */