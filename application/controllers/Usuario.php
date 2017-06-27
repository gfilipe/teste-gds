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

	public function edit($idusuario){
		$this->load->model('Usuario_model','user',TRUE);
		$existe = $this->user->verificaExistencia($idusuario);
		if($existe){
			$data['usuario'] = $this->user->getUsuarioByID($idusuario);
			$this->load->view('edit_usuario',$data);
		}else{
			echo '<script>alert("usuário não encontrado ou inexistente!");</script>';
			redirect('usuario/listar','refresh');
		}		
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

	public function atualizar($idusuario){
		//atualiza o usuário no banco de dados
		$this->load->model('Usuario_model','user',TRUE);
		$existe = $this->user->verificaExistencia($idusuario);
		if($existe){
			$dados = array(
				'idusuario' => $idusuario,
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'senha' => $this->input->post('senha'),
				'status' => $this->input->post('status')
			);
			$add = $this->user->atualizar($dados);
			if($add){
				echo '<script>alert("usuário atualizado com sucesso!");</script>';
				redirect('usuario/listar','refresh');
			}else{
				echo '<script>alert("não foi possível atualizar esse usuário!");</script>';
				redirect('usuario/listar','refresh');
			}
		}else{
			echo '<script>alert("usuário não encontrado ou inexistente!");</script>';
			redirect('usuario/listar','refresh');
		}
	}

	public function delete($idusuario){
		$this->load->model('Usuario_model','user',TRUE);
		$existe = $this->user->verificaExistencia($idusuario);
		if($existe){
			$del = $this->user->delete($idusuario);
			if($del){
				echo '<script>alert("usuário excluído com sucesso!");</script>';
				redirect('usuario/listar','refresh');
			}else{
				echo '<script>alert("não foi possível excluir esse usuário!");</script>';
				redirect('usuario/listar','refresh');
			}
		}else{
			echo '<script>alert("usuário não encontrado ou inexistente!");</script>';
			redirect('usuario/listar','refresh');
		}
	}

	public function logar()
	{
		//autenticar usuário
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */