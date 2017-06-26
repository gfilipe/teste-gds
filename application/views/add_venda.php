<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cadastrar Venda - Teste GDS Informática</title>
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
		<div class="card card-container">
			<p id="profile-name" class="profile-name-card">Cadastrar Venda</p>
			<form class="form-signin" method="post" action="<?php echo base_url(); ?>venda/cadastrar">
				<span id="reauth-email" class="reauth-email"></span>
				<select name="idcliente" class="form-control" required autofocus>
					<option value="">cliente</option>
					<?php 
						foreach($clientes as $cli){
							echo "<option value=".$cli['idcliente'].">".$cli['nome']."</option>";
						}
					?>
				</select><br/>
				<select name="idusuario" class="form-control" required autofocus>
					<option value="">usuário</option>
					<?php 
						foreach($usuarios as $user){
							echo "<option value=".$user['idusuario'].">".$user['nome']."</option>";
						}
					?>
				</select><br/>
				<p><strong>Produtos</strong></p>
				<table class="table">
					<tr>
						<td>&nbsp;</td>
						<td>Produto</td>
						<td>Qtd</td>
					</tr>
					<?php 
						foreach($produtos as $prod){
							echo "
								<tr>
									<td><input type='checkbox' name='idproduto[]' value='".$prod['idproduto']."' /></td>
									<td>".$prod['produto']." | Preço: ".number_format($prod['preco'],2,',','.')."</td>
									<td><input type='number' name='qtd_".$prod['idproduto']."' class='form-control' placeholder='qtd' autofocus value='' /></td>
								</tr>
							";
						}
					?>
				</table>
				<br/>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">cadastrar</button>
			</form>
		</div>
    </div>
</body>
</html>