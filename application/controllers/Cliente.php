<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index()
	{
		//pagina para listar os clientes cadastrados
		$this->load->model('Cliente_model','cli',TRUE);
		$data['clientes'] = $this->cli->showAllCustomers();
		$this->load->view('listar_clientes',$data);
	}

	public function add()
	{
		//página para cadastrar clientes
		$this->load->view('add_cliente');
	}

	public function cadastrar()
	{
		//cadastra o cliente no banco de dados
		$this->load->model('Cliente_model','cli',TRUE);
		$add = $this->cli->inserir($this->input->post());
		if($add){
			echo '<script>alert("cliente cadastrado com sucesso");</script>';
			$this->add();
		}else{
			echo '<script>alert("cliente não cadastrado");</script>';
			$this->add();
		}
	}

	public function delete($idcliente){
		$this->load->model('Cliente_model','cli',TRUE);
		$existe = $this->cli->verificaExistencia($idcliente);
		if($existe){
			$del = $this->cli->delete($idcliente);
			if($del){
				echo '<script>alert("cliente excluído com sucesso!");</script>';
				redirect('cliente/','refresh');
			}else{
				echo '<script>alert("não foi possível excluir esse cliente!");</script>';
				redirect('cliente/','refresh');
			}
		}else{
			echo '<script>alert("Cliente não encontrado ou inexistente!");</script>';
			redirect('cliente/','refresh');
		}
	}

	public function edit($idcliente){
		$this->load->model('Cliente_model','cli',TRUE);
		$existe = $this->cli->verificaExistencia($idcliente);
		if($existe){
			$data['cliente'] = $this->cli->getClienteByID($idcliente);
			$this->load->view('edit_cliente',$data);
		}else{
			echo '<script>alert("Cliente não encontrado ou inexistente!");</script>';
			redirect('cliente/','refresh');
		}
	}

	public function atualizar($idcliente){
		//cadastra o cliente no banco de dados
		$this->load->model('Cliente_model','cli',TRUE);
		$existe = $this->cli->verificaExistencia($idcliente);
		if($existe){
			$dados = array(
				'idcliente' => $idcliente,
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'ativo' => $this->input->post('ativo')
			);
			$add = $this->cli->atualizar($dados);
			if($add){
				echo '<script>alert("cliente atualizado com sucesso!");</script>';
				redirect('cliente/','refresh');
			}else{
				echo '<script>alert("não foi possível atualizar esse cliente!");</script>';
				redirect('cliente/','refresh');
			}
		}else{
			echo '<script>alert("Cliente não encontrado ou inexistente!");</script>';
			redirect('cliente/','refresh');
		}
	}

	public function logar()
	{
		//autenticar usuário
		
	}


}

/* End of file Cliente.php */
/* Location: ./application/controllers/Cliente.php */