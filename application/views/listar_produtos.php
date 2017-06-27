<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listar Produtos - Teste GDS Informática</title>
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
				<h3>Lista de Produtos</h3>
				<div class="pull-left btOpcoes">
					<div class="btn-group">
					  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções <span class="caret"></span>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a href="<?php echo base_url(); ?>produto/add" title="cadastrar produto">cadastrar produto</a></li>
					  	</ul>
					</div>
				</div>
				<table class="table">
					<tbody>
						<tr>
							<td>Id produto</td>
							<td>Produto</td>
							<td>Categoria</td>
							<td>Preço</td>
							<td>Saldo</td>
							<td>Ativo</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<?php 
							foreach($produtos as $key => $p){
					 	?>
							<tr>
								<td><?php echo $p['idproduto']; ?></td>
								<td><?php echo $p['produto']; ?></td>
								<td><?php echo $p['categoria']; ?></td>
								<td><?php echo 'R$ '.number_format($p['preco'],2,',','.'); ?></td>
								<td><?php echo $p['saldo']; ?></td>
								<td><?php echo $p['status']; ?></td>
								<td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url(); ?>produto/edit/<?php echo $p['idproduto']; ?>" title="editar produto">editar</a></td>
								<td><a class="btn btn-danger btn-sm btExcluir" idproduto="<?php echo $p['idproduto']; ?>" role="button" href="javascript:void(0);" title="excluir produto">excluir</a></td>
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
<script type="text/javascript">
	$('a.btExcluir').on('click',function(){
		idproduto = $(this).attr('idproduto');
		excluir = window.confirm('Deseja realmente excluir esse produto?');
		if(excluir){
			$(this).removeAttr('href');
			$(this).attr('href','<?php echo base_url(); ?>produto/delete/'+idproduto+'');
			window.location.href = '<?php echo base_url(); ?>produto/delete/'+idproduto+'';
		}
	});
</script>
</html>