<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		//pagina para login de usuários
		$this->load->model('Categoria_model','categoria',TRUE);
		$this->load->view('lista_categorias');
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

	public function deletar()
	{
		
		
	}

	public function alterar()
	{
		
		
	}

	public function listar()
	{
		$this->load->model('Categoria_model','cat',TRUE);
		return $this->cat->listar();
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */