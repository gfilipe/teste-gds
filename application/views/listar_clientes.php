<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listar Clientes - Teste GDS Informática</title>
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
				<h3>Lista de Clientes</h3>
				<div class="pull-left btOpcoes">
					<div class="btn-group">
					  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções <span class="caret"></span>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a href="<?php echo base_url(); ?>cliente/add" title="cadastrar cliente">cadastrar cliente</a></li>
					  	</ul>
					</div>
				</div>
				<table class="table">
					<tbody>
						<tr>
							<td><strong>Id cliente</strong></td>
							<td><strong>Nome</strong></td>
							<td><strong>E-mail</strong></td>
							<td><strong>Ativo</strong></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<?php 
							foreach($clientes as $key => $cli){
					 	?>
							<tr>
								<td><?php echo $cli['idcliente']; ?></td>
								<td><?php echo $cli['nome']; ?></td>
								<td><?php echo $cli['email']; ?></td>
								<td><?php echo $cli['ativo']; ?></td>
								<td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url(); ?>cliente/edit/<?php echo $cli['idcliente']; ?>" title="editar cliente">editar</a></td>
								<td><a class="btn btn-danger btn-sm btExcluir" idcliente="<?php echo $cli['idcliente']; ?>" role="button" href="<?php echo base_url(); ?>cliente/delete/<?php echo $cli['idcliente']; ?>" title="excluir cliente">excluir</a></td>
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
		idcliente = $(this).attr('idcliente');
		excluir = window.confirm('Deseja realmente excluir esse cliente?');
		if(excluir){
			$(this).removeAttr('href');
			$(this).attr('href','<?php echo base_url(); ?>cliente/delete/'+idcliente+'');
			window.location.href = '<?php echo base_url(); ?>cliente/delete/'+idcliente+'';
		}
	});
</script>
</html>