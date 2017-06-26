<nav class="navbar navbar-default " role="navigation">
	<div class="container">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-left">
		        <li><a href="<?php echo base_url(); ?>usuario/listar">Usuários</a></li>
		        <li><a href="<?php echo base_url(); ?>cliente/">Clientes</a></li>
		        <li><a href="<?php echo base_url(); ?>categoria/">Categorias</a></li>
		        <li><a href="<?php echo base_url(); ?>produto/">Produtos</a></li>
		        <li><a href="<?php echo base_url(); ?>venda/">Vendas</a></li>
	      	</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-user"></span> 
						<strong><?php echo 'Gabriel Carvalho'; ?></strong>
						<span class="glyphicon glyphicon-chevron-down"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="navbar-login">
								<div class="row">
									<div class="col-lg-8">
										<p class="text-left"><strong><?php echo 'Gabriel Carvalho'; ?></strong></p>
										<p class="text-left small"><?php echo 'gabriel@teste.com'; ?></p>
									</div>
								</div>
							</div>
						</li>
						<li class="divider"></li>
						<li>
							<div class="navbar-login navbar-login-session">
								<div class="row">
									<div class="col-lg-12">
										<p>
											<a href="<?php echo base_url(); ?>usuario/logout" class="btn btn-danger btn-block">Sair</a>
										</p>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>