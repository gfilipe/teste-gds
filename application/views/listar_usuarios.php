<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listar Usuários - Teste GDS Informática</title>
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
				<h3>Lista de Usuários</h3>
				<div class="pull-left btOpcoes">
					<div class="btn-group">
					  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções <span class="caret"></span>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a href="<?php echo base_url(); ?>usuario/add" title="Cadastrar usuário">Cadastrar usuário</a></li>
					  	</ul>
					</div>
				</div>
				<table class="table">
					<tbody>
						<tr>
							<td>Id usuário</td>
							<td>Nome</td>
							<td>E-mail</td>
							<td>Ativo</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<?php 
							foreach($usuarios as $key => $u){
					 	?>
							<tr>
								<td><?php echo $u['idusuario']; ?></td>
								<td><?php echo $u['nome']; ?></td>
								<td><?php echo $u['email']; ?></td>
								<td><?php echo $u['status']; ?></td>
								<td><a class="btn btn-success btn-sm" role="button" href="<?php echo base_url(); ?>usuario/edit/<?php echo $u['idusuario']; ?>" title="editar usuário">editar</a></td>
								<td><a class="btn btn-danger btn-sm btExcluir" idusuario="<?php echo $u['idusuario']; ?>" role="button" href="javascript:void(0);" title="excluir usuário">excluir</a></td>
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
		idusuario = $(this).attr('idusuario');
		excluir = window.confirm('Deseja realmente excluir esse usuário?');
		if(excluir){
			$(this).removeAttr('href');
			$(this).attr('href','<?php echo base_url(); ?>usuario/delete/'+idusuario+'');
			window.location.href = '<?php echo base_url(); ?>usuario/delete/'+idusuario+'';
		}
	});
</script>
</html>