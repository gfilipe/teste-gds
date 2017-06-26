<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	
	public function index()
	{
		//pagina para login de usuários
		$this->load->view('login');
	}

	public function listar()
	{
		//pagina para listar os usuários cadastrados
		$this->load->model('Usuario_model','user',TRUE);
		$data['usuarios'] = $this->user->listarTodos();
		$this->load->view('listar_usuarios',$data);
	}

	public function add()
	{
		//página para cadastrar usuários
		$this->load->view('add_usuario');
	}

	public function cadastrar()
	{
		//cadastra o usuário no banco de dados
		$this->load->model('Usuario_model','usuario',TRUE);
		$add = $this->usuario->inserir($this->input->post());
		if($add){
			echo '<script>alert("usuário cadastrado com sucesso");</script>';
			$this->index();
		}else{
			echo '<script>alert("usuário não cadastrado");</script>';
			$this->index();
		}
	}

	public function logar()
	{
		//autenticar usuário
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */