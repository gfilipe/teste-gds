<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venda extends CI_Controller {

	public function index()
	{
		//pagina para listar todas as vendas
		$this->load->model('Venda_model','sales',TRUE);
		$data['vendas'] = $this->sales->listar();
		$this->load->view('listar_vendas',$data);
	}

	public function add()
	{
		//página com o formulário para cadastrar as vendas
		$this->load->model('Cliente_model','cli',TRUE);
		$this->load->model('Usuario_model','usu',TRUE);
		$this->load->model('Produto_model','prod',TRUE);
		$data['clientes'] = $this->cli->listar();
		$data['usuarios'] = $this->usu->listar();
		$data['produtos'] = $this->prod->listar();
		$this->load->view('add_venda',$data);
	}

	public function cadastrar()
	{
		//cadastra a venda no banco de dados
		$this->load->model('Venda_model','sale',TRUE);
		$add = $this->sale->inserir($this->input->post());
		if($add){
			echo '<script>alert("Venda efetuada com sucesso!");</script>';
			$this->index();
		}else{
			echo '<script>alert("Venda não efetuada!");</script>';
			$this->add();
		}
	}

	public function deletar()
	{
		
		
	}

	public function alterar()
	{
		
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */