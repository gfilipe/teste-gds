<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Detalhes da Venda - Teste GDS Informática</title>
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
				<h3>Detalhes da Venda</h3>
				<div class="pull-left btOpcoes">
					<div class="btn-group">
					  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções <span class="caret"></span>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a href="<?php echo base_url(); ?>venda/add" title="cadastrar venda">cadastrar venda</a></li>
					    	<li><a href="<?php echo base_url(); ?>venda/" title="listar vendas">listar vendas</a></li>
					  	</ul>
					</div>
				</div><br><br><br>
				<h5>Id venda: <?php echo $detalhesVenda[0]['idvenda']; ?></h5>
				<h5>Cliente: <?php echo $detalhesVenda[0]['nome_cliente']; ?></h5>
				<h5>Usuário: <?php echo $detalhesVenda[0]['nome_usuario']; ?></h5>
				<h5>Data da venda: <?php echo date('d/m/Y H:i:s',strtotime($detalhesVenda[0]['data'])); ?></h5>
				<br>
				<table class="table">
					<tbody>
						<tr>
							<td><strong>Id produto</strong></td>
							<td><strong>Produto</strong></td>
							<td><strong>Preço/unidade</strong></td>
							<td><strong>Quantidade</strong></td>
							<td><strong>Preço pago</strong></td>
						</tr>
						<?php 
							foreach($itensVenda as $key => $iv){
					 	?>
							<tr>
								<td><?php echo $iv['idproduto']; ?></td>
								<td><?php echo $iv['produto']; ?></td>
								<td><?php echo 'R$ '.number_format($iv['preco'],2,',','.'); ?></td>
								<td><?php echo $iv['qtd']; ?></td>
								<td><?php echo 'R$ '.number_format($iv['precopago'],2,',','.'); ?></td>
							</tr>
						<?php 
							}
						?>
						<tr>
							<td colspan="5">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5">Valor Total: R$ <strong><?php echo number_format($valorTotal[0]['valorTotal'],2,',','.'); ?></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</body>
</html>