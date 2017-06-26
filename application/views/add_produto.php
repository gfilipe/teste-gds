<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cadastrar Produto - Teste GDS Informática</title>
		<link href="<?php echo base_url(); ?>assets/css/categoria.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/css/nav_bar.css" rel="stylesheet" type="text/css">
		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
			<p id="profile-name" class="profile-name-card">Cadastrar Produto</p>
			<form class="form-signin" method="post" action="<?php echo base_url(); ?>produto/cadastrar">
				<span id="reauth-email" class="reauth-email"></span>
				<select name="idcategoria" class="form-control" required autofocus>
					<option value="">categoria</option>
					<?php 
						foreach($categorias as $cat){
							echo "<option value=".$cat['idcategoria'].">".$cat['categoria']."</option>";
						}
					?>
				</select><br/>
				<input type="text" id="inputProduto" name="produto" class="form-control" placeholder="Produto" required autofocus><br/>
				<input type="number" id="inputPreco" name="preco" class="form-control" step="0.01" placeholder="Preço" required autofocus><br/>
				<input type="number" id="inputSaldo" name="saldo" class="form-control" placeholder="Saldo" required autofocus><br/>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">cadastrar</button>
			</form>
		</div>
    </div>
</body>
</html>