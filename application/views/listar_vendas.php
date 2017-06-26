<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listar Vendas - Teste GDS Informática</title>
		<link href="<?php echo base_url(); ?>assets/css/add_venda.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/css/nav_bar.css" rel="stylesheet" type="text/css">
		<!-- Jquery -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
		$this->load->view('nav_bar');
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 tabelaVendas">
				<h3>Lista de Vendas</h3>
				<table class="table">
					<tbody>
						<tr>
							<td>Id venda</td>
							<td>Cliente</td>
							<td>Usuário</td>
							<td>Data venda</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<?php 
							foreach($vendas as $key => $v){
					 	?>
							<tr>
								<td><?php echo $v['idvenda']; ?></td>
								<td><?php echo $v['nome_cliente']; ?></td>
								<td><?php echo $v['nome_usuario']; ?></td>
								<td><?php echo date('d/m/Y H:i:s',strtotime($v['data'])); ?></td>
								<td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url(); ?>venda/detalhes/<?php echo $v['idvenda']; ?>" title="visualizar venda">ver</a></td>
								<td><a class="btn btn-danger btn-sm" role="button" href="<?php echo base_url(); ?>venda/excluir/<?php echo $v['idvenda']; ?>" title="excluir venda">excluir</a></td>
							</tr>
						<?php 
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</body>
</html>