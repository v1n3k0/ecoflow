<?php include_once("conexao.php"); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>ECOflow</title>

	<!-- Links para Bootsrap -->
	<link rel="stylesheet"  href="../css/bootstrap.css">
	<link rel="stylesheet"  href="../css/bootstrap-theme.css">

	<!-- Script para API do google gera grafico -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
</head>
<body>

<!-- Div para navbar -->
<div>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="../index.php" class="navbar-brand"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> HOME</a></li>
					<li><a href="../relatorio/grafico.php">Gráfico</a></li>
					<!--
					<li>
						<li class="dropdown">
				        	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
				         	<ul class="dropdown-menu">
				            <li><a href="../Usuario/buscaUsuario.php">Consultar</a></li>
				            <li><a href="../Usuario/alterarUsuario.php">Alterar</a></li>
				            <li><a href="../Usuario/desativarUsuario.php">Desativar</a></li>
				          </ul>
				        </li>
					</li>
					-->
				</ul>				
				<ul class="nav navbar-nav navbar-right">
					<?php 
					if( !isset($_SESSION["login"])){
						?>
					<li>
						<a href="../login/login.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Entrar</a>
					</li>
					<?php }else{ ?>
					<li>
						<a href="../sair.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair</a>
					</li>
					<?php } ?>
				</ul>				
			</div>
		</div>
	</nav>
</div>

<div class="container">
	<div class="col-md-10 col-md-offset-1">
	
	


	

