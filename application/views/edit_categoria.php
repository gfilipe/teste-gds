<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Editar Categoria - Teste GDS Informática</title>
		<link href="<?php echo base_url(); ?>assets/css/add_venda.css" rel="stylesheet" type="text/css">
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
			<p id="profile-name" class="profile-name-card">Editar Categoria</p><br>
			<form class="form-signin" method="post" action="<?php echo base_url(); ?>categoria/atualizar/<?php echo $categoria[0]['idcategoria']; ?>">
				<span>Categoria</span>
				<input type="text" id="inputNome" name="categoria" class="form-control" placeholder="Categoria" required autofocus value="<?php echo $categoria[0]['categoria']; ?>" />
				<span>Categoria ativa?</span>
				<select name="status" class="form-control">
					<?php 
						if($categoria[0]['status'] == 'S'){
							echo '
								<option value="S" selected="selected">SIM</option>
								<option value="N">NÃO</option>
							';
						}else{
							echo '
								<option value="S">SIM</option>
								<option value="N" selected="selected">NÃO</option>
							';
						}
					?>
				</select><br>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">atualizar</button>
			</form>
		</div>
    </div>
</body>
</html>