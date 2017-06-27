<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {
	
	public function index()
	{
		//pagina para login de usuários
		$this->load->model('Categoria_model','cat',TRUE);
		$data['categoria'] = $this->cat->showAllCategories();
		$this->load->view('listar_categorias',$data);
	}

	public function add()
	{
		//página para cadastrar usuários
		$this->load->view('add_categoria');
	}

	public function cadastrar()
	{
		//cadastra o usuário no banco de dados
		$this->load->model('Categoria_model','categoria',TRUE);
		$add = $this->categoria->inserir($this->input->post());
		if($add){
			echo '<script>alert("Categoria cadastrada com sucesso");</script>';
			$this->add();
		}else{
			echo '<script>alert("Categoria não cadastrada");</script>';
			$this->add();
		}
	}

	public function edit($idcategoria){
		$this->load->model('Categoria_model','cat',TRUE);
		$existe = $this->cat->verificaExistencia($idcategoria);
		if($existe){
			$data['categoria'] = $this->cat->getCategoriaByID($idcategoria);
			$this->load->view('edit_categoria',$data);
		}else{
			echo '<script>alert("categoria não encontrada ou inexistente!");</script>';
			redirect('categoria/','refresh');
		}
	}

	public function delete($idcategoria){
		$this->load->model('Categoria_model','cat',TRUE);
		$existe = $this->cat->verificaExistencia($idcategoria);
		if($existe){
			$del = $this->cat->delete($idcategoria);
			if($del){
				echo '<script>alert("categoria excluída com sucesso!");</script>';
				redirect('categoria/','refresh');
			}else{
				echo '<script>alert("não foi possível excluir essa categoria!");</script>';
				redirect('categoria/','refresh');
			}
		}else{
			echo '<script>alert("categoria não encontrada ou inexistente!");</script>';
			redirect('categoria/','refresh');
		}
	}

	public function atualizar($idcategoria){
		//atualiza a categoria no banco de dados
		$this->load->model('Categoria_model','cat',TRUE);
		$existe = $this->cat->verificaExistencia($idcategoria);
		if($existe){
			$dados = array(
				'idcategoria' => $idcategoria,
				'categoria' => $this->input->post('categoria'),
				'status' => $this->input->post('status')
			);
			$add = $this->cat->atualizar($dados);
			if($add){
				echo '<script>alert("categoria atualizada com sucesso!");</script>';
				redirect('categoria/','refresh');
			}else{
				echo '<script>alert("não foi possível atualizar essa categoria!");</script>';
				redirect('categoria/','refresh');
			}
		}else{
			echo '<script>alert("categoria não encontrada ou inexistente!");</script>';
			redirect('categoria/','refresh');
		}
	}

	public function listar()
	{
		$this->load->model('Categoria_model','cat',TRUE);
		return $this->cat->listar();
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */