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
			redirect('venda/','refresh');
		}else{
			echo '<script>alert("Venda não efetuada!");</script>';
			redirect('venda/add','refresh');
		}
	}

	public function delete($idvenda){
		$this->load->model('Venda_model','sales',TRUE);
		$existe = $this->sales->verificaExistencia($idvenda);
		if($existe){
			$statusDelete = $this->sales->delete($idvenda);
			if($statusDelete){
				echo '<script>alert("Venda excluída com sucesso!");</script>';
				redirect('venda/','refresh');
			}else{
				echo '<script>alert("Não foi possível excluir essa venda!");</script>';
				redirect('venda/','refresh');
			}
		}else{
			echo '<script>alert("Venda não encontrada ou inexistente!");</script>';
			redirect('venda/','refresh');
		}

		
	}

	public function detalhes($idvenda){
		$this->load->model('Venda_model','sales',TRUE);
		$existe = $this->sales->verificaExistencia($idvenda);
		if($existe){
			$data['detalhesVenda'] = $this->sales->showSalesDetails($idvenda);
			$data['itensVenda'] = $this->sales->showSalesItens($idvenda);
			$data['valorTotal'] = $this->sales->showValorTotalVenda($idvenda);
			$this->load->view('detalhes_venda',$data);
		}else{
			echo '<script>alert("Venda não encontrada ou inexistente!");</script>';
			redirect('venda/','refresh');
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */