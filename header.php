<?php include_once("conexao.php"); //conexão para banco de dados ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ECOflow</title>

	<!-- Icone de pagina-->
	<link rel="icon" href="../img/ECOFlow.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../img/ECOFlow.ico" type="image/x-icon" />

	<!-- Links para Bootsrap -->
	<link rel="stylesheet"  href="../css/bootstrap.min.css">
	<link rel="stylesheet"  href="../css/bootstrap-theme.min.css">

	<!--CSS do site-->
	<link rel="stylesheet"  href="../css/estilo.css">

	<!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="tudo">

	<!-- Tag para navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top navbar-transparente">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		    <!--botão do menu mobile-->
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Menu</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <!--Logo e link na brand-->
		      <a href="../home/home.php" class="navbar-brand">
		      	<div id="barnav-link">
		      		<img alt="Brand" src="../img/ECOFlow.ico" id="imgbrand">
		      		<strong>ECO</strong>flow
		      	</div>
		      </a>
		    </div>

		    <!--Menu da navbar-->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">

					<!--desenha divisor entre brand e menu-->
					<li class="hidden-xs divisor" role="separator"></li>
					<!--Opção relatorio-->
					<li class="dropdown">
			          <a href="#" class="dropdown-toggle" id="barnav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          	Relatório
			          	<span class="caret"></span>
			          </a>
			          <ul class="dropdown-menu">
			            <li>
			            	<a href="../relatorio/graficoMes.php">Mês</a>
			            </li>
			            <li>
			            	<a href="../relatorio/graficoAno.php">Ano</a>
			            </li>
			          </ul>
			        </li><!--Fecha li relatorio-->

				</ul>

				<!--Navbar a direita-->
				<ul class="nav navbar-nav navbar-right">
					<!--Muda menu se esta logado ou deslogado-->
					<?php 
					if( !isset($_SESSION["id"])){
					?>
						<!--Menu para deslogado-->
						<li>
							<a id="barnav-link" href="../login/validaLogin.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Entrar</a>
						</li>

					<?php }else{ ?>
						<!--Menu para logado-->
						<li>
							<li class="dropdown">
					          <a id="barnav-link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
					          	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
					          	<?php echo $_SESSION["login"] ?> 
					          	<span class="caret"></span>
					          </a>
					          <ul class="dropdown-menu">
					            <li>
					            	<a href="../login/alteraEmail.php">
						            	<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						            	E-mail
					            	</a>
					            </li>
						        <li>
						        	<a href="../login/alteraConta.php"> 
						        	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						        	Conta
						        	</a>
						        </li>
						        <li role="separator" class="divider"></li>
						        <li>
						        	<a href="../sair.php">
						        		<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 
						        		Sair
						        	</a>
						        </li>
					          </ul>
					        </li>
						</li><!--Fecha menu logado-->

					<?php } ?>
				</ul><!--Fecha ul da navbar-right-->

			</div><!--Fecha menu da navbar-->
		</div><!--Fecha container-fluid-->
	</nav> <!--Fim da navbar-->

	<!--Tag para o conteudo da pagina-->
	<div class="container" id="conteudo">